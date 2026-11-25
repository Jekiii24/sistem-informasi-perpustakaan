<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $borrowings = Borrowing::with('user', 'member', 'details.book')->latest()->paginate(10);
        return view('borrowings.index', compact('borrowings'));
    }

    public function show(Borrowing $borrowing)
    {
        $borrowing->load('user', 'member', 'details.book');
        return view('borrowings.show', compact('borrowing'));
    }

    public function create()
    {
        if (!in_array(auth()->user()->role, ['admin', 'petugas'])) {
            abort(403);
        }
        $members = Member::all();
        $books = Book::where('stock', '>', 0)->get();
        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        if (!in_array(auth()->user()->role, ['admin', 'petugas'])) {
            abort(403);
        }

        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'books' => 'required|array',
            'books.*.book_id' => 'required|exists:books,id',
            'books.*.qty' => 'required|integer|min:1',
        ]);

        // Validasi stok
        foreach ($validated['books'] as $item) {
            $book = Book::findOrFail($item['book_id']);
            if ($book->stock < $item['qty']) {
                return back()->withErrors("Stok buku '{$book->title}' tidak cukup");
            }
        }

        // Buat transaksi peminjaman
        $borrowing = Borrowing::create([
            'user_id' => auth()->id(),
            'member_id' => $validated['member_id'],
            'borrow_date' => now(),
            'due_date' => now()->addDays(7),
            'status' => 'borrowed',
        ]);

        // Buat detail & kurangi stok
        foreach ($validated['books'] as $item) {
            BorrowingDetail::create([
                'borrowing_id' => $borrowing->id,
                'book_id' => $item['book_id'],
                'qty' => $item['qty'],
            ]);

            $book = Book::findOrFail($item['book_id']);
            $book->decrement('stock', $item['qty']);
        }

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dibuat');
    }

    public function returnBook(Borrowing $borrowing)
    {
        if (!in_array(auth()->user()->role, ['admin', 'petugas'])) {
            abort(403);
        }

        if ($borrowing->status === 'returned') {
            return back()->withErrors('Peminjaman sudah dikembalikan');
        }

        return view('borrowings.return', compact('borrowing'));
    }

    public function storeReturn(Request $request, Borrowing $borrowing)
    {
        if (!in_array(auth()->user()->role, ['admin', 'petugas'])) {
            abort(403);
        }

        if ($borrowing->status === 'returned') {
            return back()->withErrors('Peminjaman sudah dikembalikan');
        }

        $now = now();
        $isLate = $now->greaterThan($borrowing->due_date);
        $lateDays = $isLate ? (int) $borrowing->due_date->diffInDays($now) : 0;

        // Update status & tanggal pengembalian
        $borrowing->update([
            'return_date' => $now,
            'status' => 'returned',
        ]);

        // Tambah stok buku
        foreach ($borrowing->details as $detail) {
            $detail->book->increment('stock', $detail->qty);
        }

        $message = 'Pengembalian berhasil dicatat.';
        if ($isLate) {
            $message .= " Peminjaman terlambat {$lateDays} hari dari tanggal jatuh tempo!";
        }

        return redirect()->route('borrowings.index')->with('success', $message);
    }
}
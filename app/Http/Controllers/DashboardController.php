<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalStock = Book::sum('stock');
        $totalMembers = Member::count();
        $borrowedCount = Borrowing::where('status', 'borrowed')->count();
        $overdueCount = Borrowing::where('status', 'borrowed')
            ->whereDate('due_date', '<', now())
            ->count();

        $recentBorrowings = Borrowing::with(['member', 'details.book'])
            ->latest()
            ->limit(6)
            ->get();

        $recentBooks = Book::with('category')
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalBooks',
            'totalStock',
            'totalMembers',
            'borrowedCount',
            'overdueCount',
            'recentBorrowings',
            'recentBooks',
        ));
    }
}

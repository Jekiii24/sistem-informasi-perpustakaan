<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
{
    $query = Book::with('category');

    if ($search = $request->input('search')) {
        $query->where(function ($q) use ($search) {
        $q->where('title', 'like', "%{$search}%")
        ->orWhere('author', 'like', "%{$search}%");
    });
}

    $books = $query->paginate(10)->withQueryString();
    return view('books.index', compact('books'));
}

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'isbn' => 'required|string|unique:books',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Book $book)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id,
            'author' => 'required|string',
            'publisher' => 'required|string',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diubah');
    }

    public function destroy(Book $book)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }
}
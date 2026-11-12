<?php

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

        return view('dashboard', compact('totalBooks', 'totalStock', 'totalMembers', 'borrowedCount'));
    }
}

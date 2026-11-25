<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $members = Member::paginate(10);
        return view('members.index', compact('members'));
    }

    public function show(Member $member)
    {
        $borrowings = $member->borrowings()->with('details.book')->latest()->get();
        return view('members.show', compact('member', 'borrowings'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('members.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'member_code' => 'required|string|unique:members',
            'name' => 'required|string',
            'email' => 'required|email|unique:members',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function edit(Member $member)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'member_code' => 'required|string|unique:members,member_code,' . $member->id,
            'name' => 'required|string',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil diubah');
    }

    public function destroy(Member $member)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $member->delete();

        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus');
    }
}
<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Illuminate\Routing\Controllers\HasMiddleware;

class MemberController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return ['auth'];
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
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        Member::create($request->validated());

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->validated());

        return redirect()->route('members.index')->with('success', 'Anggota berhasil diubah');
    }

    public function destroy(Member $member)
    {
        $this->authorize('delete', $member);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus');
    }
}

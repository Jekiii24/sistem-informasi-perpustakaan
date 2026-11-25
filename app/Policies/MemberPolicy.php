<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Member;
use App\Models\User;

class MemberPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'petugas';
    }

    public function view(User $user, Member $member): bool
    {
        return $user->role === 'admin' || $user->role === 'petugas';
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Member $member): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Member $member): bool
    {
        return $user->role === 'admin';
    }
}

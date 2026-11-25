<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Borrowing;
use App\Models\User;

class BorrowingPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function view(User $user, Borrowing $borrowing): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function update(User $user, Borrowing $borrowing): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function delete(User $user, Borrowing $borrowing): bool
    {
        return $user->role === 'admin';
    }
}

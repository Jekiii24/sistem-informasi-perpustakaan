<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'petugas';
    }

    public function view(User $user, Book $book): bool
    {
        return $user->role === 'admin' || $user->role === 'petugas';
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }
}

<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function view(User $user, Category $category): bool
    {
        return in_array($user->role, ['admin', 'petugas'], true);
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Category $category): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->role === 'admin';
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return in_array(auth()->user()?->role, ['admin', 'petugas'], true);
    }

    public function rules(): array
    {
        return [
            'member_id' => 'required|exists:members,id',
            'books' => 'required|array',
            'books.*.book_id' => 'required|exists:books,id',
            'books.*.qty' => 'required|integer|min:1',
        ];
    }
}

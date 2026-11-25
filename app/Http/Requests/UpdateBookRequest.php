<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'isbn' => 'required|string|unique:books,isbn,'.$this->route('book'),
            'author' => 'required|string',
            'publisher' => 'required|string',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ];
    }
}

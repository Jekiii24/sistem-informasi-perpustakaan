<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'member_code' => 'required|string|unique:members,member_code,'.$this->route('member'),
            'name' => 'required|string',
            'email' => 'required|email|unique:members,email,'.$this->route('member'),
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ];
    }
}

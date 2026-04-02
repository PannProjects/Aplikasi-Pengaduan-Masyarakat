<?php

namespace App\Http\Requests;

use App\Models\Petugas;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nik' => [
                'required', 'string', 'max:16',
                Rule::unique(Petugas::class)->ignore($this->user()->id),
            ],
            'nama' => ['required', 'string', 'max:35'],
            'username' => [
                'required', 'string', 'max:25',
                Rule::unique(Petugas::class)->ignore($this->user()->id),
            ],
            'telp' => ['required', 'string', 'max:14'],
        ];
    }
}

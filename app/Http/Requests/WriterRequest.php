<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WriterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $routeId = $this->route('writer');

        return [
            'name' => 'required|string|min:3|max:255|unique:writers,name,' . $routeId . ',id',
            'email' => 'required|email|max:255|unique:writers,email,' . $routeId . ',id',
            'password' => $routeId ? 'nullable|string|min:8' : 'required|string|min:8', // Required jika create, nullable jika update
            'role' => 'required|in:owner,writer',
            'is_verified' => 'required|boolean', // Menyimpan nilai 1 (verified) atau 0 (non-verified)
            'verified_at' => 'nullable|date', // Tanggal verifikasi, nullable jika belum verified
        ];
    }
}

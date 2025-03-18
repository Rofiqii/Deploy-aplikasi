<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        $userId = $this->route('user') ? $this->route('user')->id : null;
        return [
            'name' => 'required|max:150',            
            'email' => 'required|string|email|max:100|unique:users,email,' . $userId,
            'role' => 'required|in:Admin,Karyawan',
            'photo' => 'nullable|image',
            'password' => $this->isMethod('post') || $this->filled('password') ? 'required|string|min:6' : 'nullable',
            'confirm_password' => $this->filled('password') ? 'required|same:password' : 'nullable',
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus minimal 6 karakter.',
            'confirm_password.required' => 'Konfirmasi password harus diisi.',
            'confirm_password.same' => 'Password tidak sama.',
            'photo.image' => 'File yang diunggah harus berupa gambar.',
            'role.required' => 'Peran harus dipilih.',
        ];
    }
}

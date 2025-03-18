<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SheepRequest extends FormRequest {
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
        return [
            // 'id' => 'required',
            'sheep_name' => 'required',
            'sheep_birth' => 'required|date',
            'sheep_gender' => 'required',
            'sheep_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array {
        return [
            // 'id.required' => 'Id harus diisi.',
            'sheep_name.required' => 'Nama domba harus diisi.',
            'sheep_birth.required' => 'Tanggal lahir harus diisi.',
            'sheep_birth.date' => 'Format tanggal tidak valid.',
            'sheep_gender.required' => 'Jenis kelamin harus dipilih.',
            'sheep_photo.image' => 'Foto domba harus berupa file gambar.',
            'sheep_photo.mimes' => 'Foto domba harus berformat jpeg, png, atau jpg.',
            'sheep_photo.max' => 'Foto domba tidak boleh lebih dari 2MB.',
        ];
    }
}

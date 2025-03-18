<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RadiologyRequest extends FormRequest {
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
        $rules = [
            'ultrasound_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'gestational_age' => 'nullable|integer|min:0',
            'pregnancy_status' => 'required|in:Bunting,Tidak Bunting',
            'additional_info' => 'nullable|string'
        ];

        if ($this->isMethod('post')) {
            $rules['assessment_id'] = 'required|exists:initial_assessments,id';
        }
        return $rules;
    }

    public function messages(): array {
        return [
            'assessment_id.required' => 'ID Domba harus diisi.',
            'assessment_id.exists' => 'ID tidak ditemukan.',
            'ultrasound_image.image' => 'File harus berupa gambar.',
            'ultrasound_image.mimes' => 'Gambar ultrasound harus berformat: jpeg, png, atau jpg.',
            'ultrasound_image.max' => 'Ukuran gambar ultrasound tidak boleh lebih dari 2MB.',
            // 'gestational_age.integer' => 'Usia Kandungan harus berupa angka bulat.',
            'pregnancy_status.required' => 'Status kehamilan harus dipilih.',
            'pregnancy_status.in' => 'Status kehamilan harus salah satu dari: Bunting, Tidak Bunting.',
        ];
    }
}

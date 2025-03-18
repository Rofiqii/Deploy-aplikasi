<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InitialAssessmentRequest extends FormRequest {
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
            // 'symptom_1' => 'required|string|max:100',
            // 'symptom_2' => 'required|string|max:100',
            // 'symptom_3' => 'required|string|max:100',
            'hoof' => 'required',
            'eye' => 'required',
            'wool' => 'required',
            'additional_info' => 'nullable|string',
        ];
    
        if ($this->isMethod('post')) {
            $rules['sheep_id'] = 'required|exists:sheep,id';
            $rules['user_id'] = 'required|exists:users,id';
        }
        return $rules;
    }

    public function messages(): array {
        return [
            'sheep_id.required' => 'ID domba harus diisi.',
            'user_id.required' => 'ID pengguna harus diisi.',
            'user_id.exists' => 'Pengguna tidak ditemukan.',
            'hoof.required' => 'Kondisi kuku harus diisi.',
            'eye.required' => 'Kondisi mata harus diisi.',
            'wool.required' => 'Kondisi bulu harus diisi.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
        return [
            'english_name' => 'required|string|max:255',
            'composition' => 'nullable|string|max:255',
            'indication' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:255',
            'titer' => 'nullable|string|max:255',
            'price' => 'nullable|integer|min:0',
            'alternatives' => 'nullable|array',
            'alternatives.*.name' => 'required_with:alternatives|string|max:255',
            'alternatives.*.composition' => 'nullable|string|max:255',
            'alternatives.*.indication' => 'nullable|string|max:255',
            'alternatives.*.type' => 'nullable|string|max:255',
            'alternatives.*.number' => 'nullable|string|max:255',
            'alternatives.*.titer' => 'nullable|string|max:255',
            'alternatives.*.price' => 'nullable|integer|min:0',
        ];
    }
    public function messages(): array
    {
        return[
            'english_name.required'=> 'هذا الحقل مطلوب',
        ];
    }
}

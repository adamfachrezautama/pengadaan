<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            //
            'description' => 'required|string|unique:categories,description|max:255',

        ];
    }

     public function messages(): array
    {
        return [
            'description.required' => 'Deskripsi wajib diisi.',
            'description.unique' => 'Deskripsi sudah digunakan.',
        ];
    }
}

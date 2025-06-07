<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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

            //  'description' => 'required|string|unique:categories,description,' . $this->category->id,

             'description' => 'required|string|unique:categories,description,' . $this->category->getKey(), // karena menggunakan route model binding, kita bisa menggunakan $this->category->getKey() untuk mendapatkan ID kategori yang sedang diupdate

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

<?php

namespace App\Http\Requests\Admin\Department;

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
            'department_name' => 'required|string|unique:departments,department_name|max:255',

            'department_code' => 'required|string|unique:departments,department_code|max:3',
        ];
    }

    public function messages(): array
    {
        return [
        //     'department_name.required' => 'Nama Departemen wajib diisi.',
        //     'department_name.unique' => 'Nama Departemen sudah digunakan.',
        //     'department_code.required' => 'Kode Departemen wajib diisi.',
        //     'department_code.unique' => 'Kode Departemen sudah digunakan.',
        ];
    }

}

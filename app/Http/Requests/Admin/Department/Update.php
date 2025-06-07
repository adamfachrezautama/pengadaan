<?php

namespace App\Http\Requests\Admin\Department;

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
            'department_name' => 'required|string|max:255|unique:departments,department_name,' . $this->department->getKey() . ',id',

            'department_code' => 'required|string|max:3|unique:departments,department_code,' . $this->department->getKey() . ',id',

        ];
    }

    public function messages(): array
    {
        return [
            'department_name.required' => 'Nama Departemen wajib diisi.',
            'department_name.unique' => 'Nama Departemen sudah digunakan.',
            'department_code.required' => 'Kode Departemen wajib diisi.',
            'department_code.unique' => 'Kode Departemen sudah digunakan.',
        ];
    }
    // public function attributes(): array
    // {
    //     return [
    //         'department_name' => 'Nama Departemen',
    //         'department_code' => 'Kode Departemen',
    //     ];
    // }
}

<?php

namespace App\Http\Requests\Admin\Items;

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
            // Validasi untuk table items
            'item_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255|unique:items,brand',
            'total_stock' => 'required|integer|min:0',
            'category_id' => 'nullable|uuid|exists:categories,id',

            // Validasi untuk relasi item_details
           'details' => 'required|array|min:1',
            'details.*.serial_number' => 'nullable|string|max:255|distinct|unique:item_details,serial_number',
            'details.*.description' => 'nullable|string|max:1000',
            'details.*.status' => 'nullable|in:available,unavailable',
        ];
    }

    public function messages(): array
    {
        return [
            // items
            'item_name.required' => 'Nama item wajib diisi.',
            'brand.required' => 'Merek item wajib diisi.',
            'brand.unique' => 'Merek sudah terdaftar.',
            'total_stock.required' => 'Stok wajib diisi.',
            'category_id.exists' => 'Kategori tidak valid.',

            // item_details
            'details.required' => 'Detail item wajib diisi.',
            'details.*.serial_number.unique' => 'Nomor seri harus unik.',
            'details.*.serial_number.distinct' => 'Nomor seri tidak boleh duplikat dalam form.',
        ];
    }
}

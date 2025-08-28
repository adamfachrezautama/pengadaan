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
            'category_id' => 'nullable|exists:categories,id',
             'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
             'price' => 'integer|min:0',

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
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpg, png, jpeg, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'price.integer' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh negatif.',
        ];
    }
}

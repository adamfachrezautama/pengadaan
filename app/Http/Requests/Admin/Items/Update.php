<?php

namespace App\Http\Requests\Admin\Items;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
             'item_name' => 'required|string|max:255',
            'brand' => ['required', 'string', 'max:255', Rule::unique('items', 'brand')->ignore($this->route('item')->id)],
            'total_stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
             'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
             'price' => 'integer|min:0',

        ];
    }
}

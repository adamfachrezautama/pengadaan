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
            'category_id' => 'nullable|uuid|exists:categories,id',
            'specification' => 'nullable|string|max:1000',
            'details' => 'required|array|min:1',
            'details.*.description' => 'nullable|string|max:1000',
            'details.*.status' => 'nullable|in:available,unavailable',
        ];
    }

    public function withValidator($validator)
    {
        $details = $this->input('details', []);

        foreach ($details as $index => $detail) {
            if (!empty($detail['serial_number'])) {
                $rule = Rule::unique('item_details', 'serial_number');

                // Cek jika sedang update (ada id-nya)
                if (!empty($detail['id'])) {
                    $rule->ignore($detail['id']);
                }

                $validator->addRules([
                    "details.$index.serial_number" => [
                        'nullable', 'string', 'max:255', 'distinct', $rule
                    ]
                ]);
            }
        }
    }

    public function messages(): array
    {
        return [
            'details.*.serial_number.unique' => 'Nomor seri sudah terdaftar.',
            'details.*.serial_number.distinct' => 'Nomor seri tidak boleh duplikat dalam form.',
        ];
    }
}

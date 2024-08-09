<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productCreate extends FormRequest
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
            'product_name' => 'required',
            'product_price' => 'required|integer|min:1|max:10000',
        ];
    }

    public function messages(): array
    {
        return [
            'product_name.required' => 'Ürün Adını Doldurun',
            'product_price.required' => 'Ürün Fiyatı Doldurun',
            'product_price.integer' => 'Ürün Fiyatı Sayı Olmalı',
            'product_price.min' => 'Ürün Fiyatı En Az 1 Olmalı',
            'product_price.max' => 'Ürün Fiyatı En Fazla 10000 Olmalı',
        ];

    }
}

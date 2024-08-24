<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationCreate extends FormRequest
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
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'user' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Başlık alanı zorunludur.',
            'title.max' => 'Başlık en fazla 255 karakter olabilir.',
            'content.required' => 'İçerik alanı zorunludur.',
            'content.min' => 'İçerik en az 10 karakter olmalıdır.',
        ];
    }
}

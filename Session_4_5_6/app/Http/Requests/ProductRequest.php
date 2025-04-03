<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'Name' => ['required', 'min:5'],
                'Description' => ['required', 'min:20'],
                'Stock' => ['required', 'integer','min:0'],
                'Price' => ['required', 'integer', 'min:100'],
                'Name' => ['required'],
        ];
    }

    public function messages(): array //Buat custom message
    {
        return [
            'Name.required' => 'Kasih Nama pls'
        ];
    }
}

<?php

namespace App\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductBulkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '*.name' => 'required|string|max:255',
            '*.price' => 'required|numeric',
            '*.quantity' => 'required|integer|max:999999'
        ];
    }
}

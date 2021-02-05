<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            "name" => "required|unique:items|min:5",
            "price" => "required|numeric|regex:/[1-9]+[0-9]*000/|min:10000",
            "stock" => "required|numeric|min:1"
        ];
    }

    public function messages()
    {
        return [
            "regex" => ":attribute must be multiply of 1000"
        ];
    }
}

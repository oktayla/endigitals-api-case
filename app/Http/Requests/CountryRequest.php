<?php

namespace App\Http\Requests;

class CountryRequest extends APIRequest
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
            'name' => ['required', 'min:3', 'unique:countries']
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'The country name has already exist.'
        ];
    }
}

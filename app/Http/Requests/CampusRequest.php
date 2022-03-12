<?php

namespace App\Http\Requests;

class CampusRequest extends APIRequest
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
            'name' => ['required', 'min:3', 'unique:campuses'],
            'address' => ['required', 'min:10'],
            'country_id' => ['required', 'exists:countries,id'],
            'school_id' => ['required', 'exists:schools,id'],
        ];
    }
}

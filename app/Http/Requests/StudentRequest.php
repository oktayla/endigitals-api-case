<?php

namespace App\Http\Requests;

class StudentRequest extends APIRequest
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
            'first_name' => ['required', 'string', 'min:3', 'max:32'],
            'last_name' => ['required', 'string', 'min:3', 'max:32'],
            'gender' => ['required', 'in:male,female'],
            'email' => ['required', 'email', 'unique:students'],
            'phone_number' => ['required'],
            'birth_date' => ['date_format:d-m-Y', 'before:today', 'nullable'],
            'campus_id' => ['required', 'exists:campuses,id']
        ];
    }
}

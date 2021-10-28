<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','digits:11', 'unique:users','regex:/^01[0-2,5].{8}$/'],
            'birthDate' => ['nullable'],
            'password' => ['required','regex:/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[a-z]).{8,}$/'],

        ];
    }
}

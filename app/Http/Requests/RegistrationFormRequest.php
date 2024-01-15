<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationFormRequest extends FormRequest
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
            'user_name' => 'required | unique:users,user_name',
            'email' => 'required | email | unique:users,email',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.required' => 'Enter your user name',
            'user_name.unique' => 'Sorry, but this username is already taken. Please provide a different one.',
            'email.required' => 'Enter your email',
            'email.unique' => 'Sorry, but this email is already taken. Please provide a different one.',
            'password.required' => 'Enter your password',
        ];
    }
}

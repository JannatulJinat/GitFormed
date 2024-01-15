<?php

namespace App\Http\Requests;

use App\Rules\UniqueRepositoryNameRule;
use Illuminate\Foundation\Http\FormRequest;

class RepositoryCreationRequest extends FormRequest
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
            'repository_name' => ['required',
                 'regex:/^[A-Za-z0-9-_]{5,10}$/',
                 new UniqueRepositoryNameRule,
            ],
        ];
    }

    public function messages(): array
    {
        return [
           'repository_name.required' => 'Enter your repository name',
           'repository_name.regex' => 'The repository name must be 5 to 10 characters long and can only contain letters, numbers, hyphens, and underscores!!!',
        ];
    }
}

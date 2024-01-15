<?php

namespace App\Rules;

use Closure;
use App\Models\Repository;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueRepositoryNameRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Repository::where('user_id', auth()->id())
            ->where('repository_name', $value)
            ->exists()
        ) {
            $fail('You already have a repository with this name');
        }
    }
}

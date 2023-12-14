<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/^\+38[0-9][1-9][0-9][1-9]{3}[1-9]{3}$/';
        if(!preg_match($pattern,$value))
        {
             $fail('Format broja telefona mora da bude +38 1-9...');
        }
    }
}

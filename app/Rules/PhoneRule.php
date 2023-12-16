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
        $pattern =  '/^\+381\d{9}$/';

        if(!preg_match($pattern,$value))
        {
             $fail('Format broja telefona mora da bude +381-9...');
        }
    }
}

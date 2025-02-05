<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $date = '';
        try {
            $date = \Datetime::createFromFormat('d-m-Y', $value);
        }catch(\Exception $ex) {
            $fail = 'Something went wrong while parsing the date!';
        }
    }
}

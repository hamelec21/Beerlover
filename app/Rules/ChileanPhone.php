<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ChileanPhone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Verifica que el número de teléfono tenga exactamente 9 dígitos y sea numérico
        if (!preg_match('/^[0-9]{9}$/', $value)) {
            $fail('El :attribute Teléfono puede tener máximo 9 carácteres.');
        }
    }
}

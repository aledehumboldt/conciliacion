<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateIMSI implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Validamos que el IMSI tenga exactamente 15 caracteres
        if (strlen($value) !== 15) {
            $fail('El :attribute debe tener exactamente 15 caracteres.');
        }

        // Validamos el prefijo del IMSI (los primeros 6 dígitos)
        if (!preg_match('/^73406(10|30)[0-9]{8}/', $value)) {
            $fail('El :attribute debe estar entre los prefijos (7340610 (SIM) o 7340630 (USIM)).');
        }

        // Validamos que los últimos 12 caracteres sean numéricos
        if (!ctype_digit(substr($value, 6))) {
            $fail('Los últimos 12 caracteres de :attribute deben ser numéricos.');
        }
    }
}

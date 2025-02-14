<?php
// app/Rules/ValidRut.php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class ValidRut implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        // Eliminar caracteres no numéricos y convertir a mayúsculas
        $rut = strtoupper(preg_replace('/[^k0-9]/i', '', $value));

        // Validar que el RUT tiene al menos un número y un dígito verificador
        if (strlen($rut) < 2) {
            $fail('El RUT ingresado no tiene un formato válido.');
            return false;
        }

        // Extraer el número y el dígito verificador
        $dv = substr($rut, -1); // Último carácter como dígito verificador
        $number = substr($rut, 0, -1); // Resto como número

        // Validar que el número del RUT sea numérico
        if (!ctype_digit($number)) {
            $fail('El número del RUT debe contener solo dígitos.');
            return false;
        }

        // Verificar que no se trate de un RUT con dígitos repetidos
        if (preg_match('/^(\d)\1+$/', $number)) {
            $fail('El RUT ingresado no es válido. No se permiten números repetidos.');
            return false;
        }

        // Validar el dígito verificador
        if (!$this->validateVerifier($number, $dv)) {
            $fail('El RUT ingresado no es válido.');
            return false;
        }

        // Formatear el RUT correctamente
        $formattedRut = $this->formatRut($number, $dv);

        return true;
    }

    /**
     * Valida el dígito verificador de un RUT.
     *
     * @param string $number El número del RUT.
     * @param string $dv El dígito verificador.
     * @return bool True si el dígito verificador es válido, false de lo contrario.
     */
    private function validateVerifier($number, $dv)
    {
        $i = 2;
        $sum = 0;

        // Calcular el dígito verificador utilizando el algoritmo de módulo 11
        foreach (array_reverse(str_split($number)) as $v) {
            if ($i == 8) {
                $i = 2;
            }
            $sum += $v * $i;
            ++$i;
        }

        $calculatedDv = 11 - ($sum % 11);

        if ($calculatedDv == 11) {
            $calculatedDv = '0';
        } elseif ($calculatedDv == 10) {
            $calculatedDv = 'K';
        } else {
            $calculatedDv = (string)$calculatedDv;
        }

        return strtoupper($dv) === $calculatedDv;
    }

    /**
     * Formatea un RUT chileno en el formato estándar.
     *
     * @param string $number El número del RUT sin dígito verificador.
     * @param string $dv El dígito verificador.
     * @return string RUT formateado.
     */
    private function formatRut($number, $dv)
    {
        // Formatear el número con puntos separadores de miles
        $formattedNumber = number_format((int)$number, 0, '', '.');

        // Retornar el número formateado junto con el dígito verificador
        return $formattedNumber . '-' . strtoupper($dv);
    }


}



<?php

namespace App\Services;

class RutService
{
    /**
     * Da formato al RUT.
     *
     * @param string $rut
     * @return string
     */
    public static function formatRut(string $rut): string
    {
        // Limpiar el RUT
        $rut = strtoupper(preg_replace('/[^k0-9]/i', '', $rut));

        // Obtener el dígito verificador
        $dv = substr($rut, -1);
        $number = substr($rut, 0, strlen($rut) - 1);

        // Formatear el número con puntos y guión
        //$formatted = number_format($number, 0, '', '.') . '-' . $dv;

        //return $formatted;
        return $number . '-' . $dv;
    }
}

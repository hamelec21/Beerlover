<?php

namespace App\Helpers;

class RutUtilities
{
    public static function validateRut($rut, $noSuspicious = true)
    {
        // Eliminar puntos y guiones
        $rut = preg_replace('/[\.\-]/', '', $rut);
        // Validar formato
        if (!preg_match('/^\d{1,8}[0-9kK]{1}$/', $rut)) {
            return false;
        }

        // Extraer dígitos y verificador
        $digits = substr($rut, 0, -1);
        $verifier = strtoupper(substr($rut, -1));

        // Calcular verificador
        $sum = 0;
        $factor = 2;

        for ($i = strlen($digits) - 1; $i >= 0; $i--) {
            $sum += $digits[$i] * $factor;
            $factor = $factor == 7 ? 2 : $factor + 1;
        }

        $dv = 11 - ($sum % 11);
        $calculatedVerifier = $dv == 11 ? '0' : ($dv == 10 ? 'K' : $dv);

        if ($noSuspicious && in_array($rut, ['44444444-4', '22222222-2', '33333333-3', '9999999-9'])) {
            return false;
        }

        return $calculatedVerifier == $verifier;
    }

    public static function validateRutList($ruts, $noSuspicious = false)
    {
        $results = [];

        foreach ($ruts as $rut) {
            $results[$rut] = self::validateRut($rut, $noSuspicious);
        }

        return $results;
    }

    public static function formatRut($rut, $format = 'DASH')
    {
        $rut = preg_replace('/[^0-9kK]/', '', $rut);

        switch ($format) {
            case 'DOTS_DASH':
                return number_format(substr($rut, 0, -1), 0, '', '.') . '-' . strtoupper(substr($rut, -1));
            case 'DOTS':
                return number_format(substr($rut, 0, -1), 0, '', '.') . strtoupper(substr($rut, -1));
            case 'DASH':
            default:
                return substr($rut, 0, -1) . '-' . strtoupper(substr($rut, -1));
        }
    }

    public static function deconstructRut($rut)
    {
        $rut = preg_replace('/[\.\-]/', '', $rut);

        return [
            'digits' => substr($rut, 0, -1),
            'verifier' => strtoupper(substr($rut, -1))
        ];
    }
}


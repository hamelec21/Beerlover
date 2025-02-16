<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class UsuariosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Devuelve la colección de usuarios para exportar.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Filtra los usuarios que tienen el rol "Socio"
        return User::role('SOCIO')->with('estadoUsuario')->get();
    }

    /**
     * Encabezados de las columnas para la exportación.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Rut',
            'Nombre',
            'Apellidos',
            'Plan',
            'Correo Electrónico',
            'phone',
            'Rol', // Ahora podemos exportar el rol
            'Estado',
            'Fecha de Registro',

        ];
    }

    /**
     * Mapea los datos de cada usuario para la exportación.
     *
     * @param \App\Models\User $user
     * @return array
     */
    public function map($user): array
    {
        // Aquí obtenemos el rol asignado usando Spatie
        $roles = $user->getRoleNames()->implode(', '); // En caso de que tenga más de un rol
        $planName = $user->plan ? $user->plan->nombre : 'Sin Plan'; // Ajusta 'nombre' al campo real en el modelo Plan

        return [
            $user->id,
            $user->rut,
            $user->name,
            $user->apellidos,
            $planName, // Mostramos el nombre del plan,
            $user->email,
            $user->phone,
            $roles, // Mostramos el rol(s) del usuario
            $user->estadoUsuario ? $user->estadoUsuario->nombre : 'Sin Estado', // Obtenemos el nombre del estado
            Carbon::parse($user->created_at)->format('d/m/Y'), // Formato de fecha
        ];
    }
}


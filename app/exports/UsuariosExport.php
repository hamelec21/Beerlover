<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

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
        return User::role('SOCIO')->get();
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
            'Nombre',
            'Apellidos',
            'Correo Electrónico',
            'phone',
            'Rol', // Ahora podemos exportar el rol
            'Fecha de Creación',
            'Fecha de Última Actualización',
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

        return [
            $user->id,
            $user->name,
            $user->email,
            $user->phone,
            $roles, // Mostramos el rol(s) del usuario
            $user->created_at,
            $user->updated_at,
        ];
    }
}


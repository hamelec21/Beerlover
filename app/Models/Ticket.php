<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['codigo_ticket', 'ticket_status_id', 'users_id', 'locales_id', 'especialidades_id', 'comunas_id', 'sectores_id','fecha_canje','hora'];
    use HasFactory;

    //scope para realizar busqueda por el nombre del local
    public function scopeBuscar($query, $buscar)
    {
        if ($buscar === '') {
            return;
        }
        return $query->where('codigo_ticket', 'like', '%' . $buscar . '%');
    }

    public function scopeEstado($query1, $estado)
    {
        if ($estado === '') {
            return;
        }
        return $query1->where('ticket_status_id', 'like', '%' . $estado . '%');
    }



    //Relaciones
    public function local()
    {
        return $this->belongsTo(Local::class, 'locales_id');
    }


    public function usuario()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function ticket_estado()
    {
        return $this->belongsTo(TicketStatu::class, 'ticket_status_id');
    }


    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidades_id');
    }


    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sectores_id');
    }


    public function comuna()
    {
        return $this->belongsTo(Comuna::class, 'comunas_id');
    }
}

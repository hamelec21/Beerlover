<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Suscripcion extends Model
{
    use HasFactory;
    protected $table = 'status_suscripciones';
    protected $fillable = ['nombre'];

    public function scopeBuscar($query, $buscar)
    {
        if ($buscar === '') {
            return;
        }
        return $query->where('nombre', 'like', '%' . $buscar . '%');
    }

    //relaciones

    public function suscripcion()
    {
        return $this->hasMany(Suscripcion::class, 'id');
    }
}

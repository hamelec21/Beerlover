<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Suscripcion extends Model
{

    use HasFactory;
    protected $table = 'tipo_suscripciones';
    protected $fillable = ['nombre'];

    public function scopeBuscar($query, $buscar)
    {
        if ($buscar === '') {
            return;
        }
        return $query->where('nombre', 'like', '%' . $buscar . '%');
    }

    //relacion

    public function suscripcion()
    {
        return $this->hasMany(Suscripcion::class, 'id');
    }

}

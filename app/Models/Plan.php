<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'planes';
    protected $fillable = ['nombre','descripcion','imagen','valor','is_active','tipo_plan_id'];

    public function scopeBuscar($query, $buscar)
    {
        if ($buscar === '') {
            return;
        }
        return $query->where('nombre', 'like', '%' . $buscar . '%');
    }

    //relaciones


/*
    public function suscripcion()
    {
        return $this->hasMany(Suscripcion::class, 'id');
    }
*/


}

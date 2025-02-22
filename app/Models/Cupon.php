<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;
    protected $table = 'cupones';
    protected $fillable=['nombre','codigo'];


    //Relación

    public function users()
    {
        return $this->hasMany(User::class, 'codigo_cupon', 'codigo');
    }

    public function scopeBuscar($query, $buscar)
    {
        if ($buscar === '') {
            return;
        }
        return $query->where('nombre', 'like', '%' . $buscar . '%');
    }



}

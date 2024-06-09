<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
     protected $table = 'especialidades';
     protected $fillable = ['nombre'];

     public function scopeBuscar($query, $buscar)
     {
         if ($buscar === '') {
             return;
         }
         return $query->where('nombre', 'like', '%' . $buscar . '%');
     }

//relaciones
public function local()
{
  return $this->hasMany(Local::class, 'id');
}


public function ticket()
{
  return $this->hasMany(Ticket::class, 'id');
}




}





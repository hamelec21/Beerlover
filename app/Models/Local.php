<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $table = 'locales';

    protected $fillable = [
        'nombre', 'direccion', 'imagen', 'especialidades_id', 'comunas_id', 'sectores_id',
        'd1', 'd2', 'd3', 'd4', 'd4', 'd5', 'd6', 'd7',
        'ham1', 'ham3', 'ham5', 'ham7', 'ham9', 'ham11', 'ham13',
        'hpm2', 'hpm4', 'hpm6', 'hpm8', 'hpm10', 'hpm12', 'hpm14','consumo_min','cerveza'
    ];



    public function scopeBuscar($query, $buscar)
    {
        if ($buscar === '') {
            return;
        }
        return $query->where('nombre', 'like', '%' . $buscar . '%');
    }


    public function scopeComunas($query, $comunas)
    {
        if ($comunas === '') {
            return;
        }
        return $query->where('comunas_id', 'like', '%' . $comunas . '%');
    }


    public function scopeSector($query2, $sector)
    {
        if ($sector ==='') {
            return;
        }
        return $query2->where('sectores_id', 'like', '%' . $sector . '%');
    }


    public function scopeEspecialidad($query3, $especialidad)
    {
        if ($especialidad ==='') {
            return;
        }
        return $query3->where('especialidades_id', 'like', '%' . $especialidad . '%');
    }

  //relaciones

  public function sector()
  {
    return $this->belongsTo(Sector::class,'sectores_id');
  }

  public function especialidad()
  {
    return $this->belongsTo(Especialidad::class,'especialidades_id');
  }

  public function comuna()
  {
    return $this->belongsTo(Comuna::class,'comunas_id');
  }

  //
  public function ticket()
{
  return $this->hasMany(Ticket::class, 'id');
}




}

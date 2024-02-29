<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;
    protected $table = 'suscripciones';
    protected $fillable = ['usuario_id','tipo_suscripciones_id','planes_id','fecha_inicio','fecha_vencimiento' ];

    public function scopeBuscar($query, $buscar)
    {
        if ($buscar === '') {
            return;
        }
        return $query->where('usuario_id', 'like', '%' . $buscar . '%');
    }
        //relaciones

        public function usuario()
        {
            return $this->belongsTo(User::class,'usuario_id');
        }

        public function tipo_suscripcion()
        {
            return $this->belongsTo(Tipo_Suscripcion::class,'tipo_suscripciones_id');
        }

        public function status_suscripcion()
        {
            return $this->belongsTo(Status_Suscripcion::class,'status_suscripciones_id');
        }

        public function plan()
        {
            return $this->belongsTo(Plan::class,'planes_id');
        }






}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historiales'; //Se dirige a la tabla
    protected $primaryKey = "id";

    public function bodegas(){
        return $this->hasOne(Bodega::class);
    }

    public function inventarios(){
        return $this->hasOne(Inventario::class);
    }

}

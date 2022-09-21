<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventarios'; //Se dirige a la tabla
    protected $primaryKey = "id";

    public function productos(){
        return $this->hasMany(Productos::class);
    }

    public function bodegas(){
        return $this->hasOne(Bodega::class);
    }

    public function historiales(){
        return $this->hasOne(Historial::class);
    }
}

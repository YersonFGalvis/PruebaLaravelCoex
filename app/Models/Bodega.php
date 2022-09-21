<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;

    protected $table = 'bodegas'; //Se dirige a la tabla
    protected $primaryKey = "id";

    public function users(){
        return $this->hasOne(User::class);
    }

    public function inventarios(){
        return $this->hasOne(Inventario::class);
    }

    public function historiales(){
        return $this->hasMany(Historial::class);
    }
}

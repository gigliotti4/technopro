<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    
    public function obtenerRelacionados(){
        return $this->hasMany('App\Models\DescargaRelacion','usuario_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;



    public function categoria(){
        return $this->belongsTo(Categorias::class,'categoria_id');
    }
    public function productos(){
        return $this->hasMany(Productos::class,'subcategoria_id');
    }


}

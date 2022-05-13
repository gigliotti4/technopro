<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'imagen', 'orden', 'nombre', 'destacado'
    ];

    public function productos(){
    	return $this->hasMany(Productos::class, 'categoria_id');
    }



    public function subcategorias(){
        return $this->hasMany(Subcategoria::class,'categoria_id');
    }

    
}

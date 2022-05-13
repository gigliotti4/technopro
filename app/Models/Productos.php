<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; 

class Productos extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id', 'descripcion', 'imagen', 'orden', 'nombre', 'codigo', 'categoria_id', 'destacados', 'subcategoria_id'
    ];


    public function categorias(){
        return $this->hasMany(Categorias::class,'categoria_id');
    }
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id', 'id');
    }





    // public function categoria(){
    //     return $this->belongsTo(Categorias::class,'category_id');
    // }
    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class,'subcategoria_id');
    }
  

}

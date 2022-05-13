<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    

    use HasFactory;
    protected $fillable=['codigo','serie', 'dimesionA', 'dimesionB', 'dimesionC', 'dimesionD', 'peso','accesorios_id'];
    
    public function accesorio(){
        return $this->belongsTo('App\Models\Accesorios', 'accesorios_id');
    }
}

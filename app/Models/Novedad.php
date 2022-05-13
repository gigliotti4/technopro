<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;
    protected $fillable=['orden','titulo','epigrafe','texto','imagen','fecha','fecha_es','category_id'];
    public function categoria(){
        return $this->belongsTo('App\Models\CategoriaNovedades','category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DescargaRelacion extends Model
{
    protected $fillable = [
        'id','producto_id','relacion_id'
    ];

    use HasFactory;

    public function descarga(){
        return $this->belongsTo('App\Models\Zonaprivada','relacion_id');
    }
}

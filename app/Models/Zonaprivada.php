<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zonaprivada extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'orden',
        'imagen',
        'nombre',
        'pdf',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evenement extends Model
{
    use HasFactory;

    protected $table = 'evenemnets'; 

    protected $fillable = [
        'Nom',
        'Description',
        'DateDebut',
        'DateFin',
        'Lieu',
    ];
}

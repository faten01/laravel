<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foire extends Model
{
    use HasFactory;
    

    protected $table = 'foire'; 

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'localisation',
        'numero',
    ];
}

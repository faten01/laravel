<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations'; // Define the table name if it's not the plural of the model name

    protected $fillable = [
        'ExposantID',
        'StandID',
        'DateReservation',
        'DateDebut',
        'DateFin',
        'Statut',
    ];

    public function exposant()
    {
        return $this->belongsTo(UserUtilisateur::class, 'ExposantID')->where('Role', 'Exposant');
    }

    public function stand()
    {
        return $this->belongsTo(Stand::class, 'StandID');
    }

}

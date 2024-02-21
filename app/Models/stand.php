<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stand extends Model
{
    use HasFactory;

    protected $table = 'stands'; // Define the table name if it's not the plural of the model name

    // If you've named your columns according to Laravel's conventions, 
    // you won't need to define a primary key
    protected $primaryKey = 'id'; // Default is 'id'

    protected $fillable = [
        'user_id',
        'description',
        'number',
        'surface',
        'status_reservation',
        // Include any other fields you want to be mass-assignable
    ];

    /**
     * Get the user that owns the stand.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'UserID');
    }
    public $timestamps = true;

}

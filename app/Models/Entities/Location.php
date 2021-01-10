<?php

namespace App\Models\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{   
    use Notifiable;

    protected $table = 'location';

    protected $fillable = [
        'id', 
        'zip_code',
        'country', 
        'city',
        'state', 
    ];

    protected $hidden = ['created_at','updated_at'];

    protected $dates = ['created_at','updated_at'];
}

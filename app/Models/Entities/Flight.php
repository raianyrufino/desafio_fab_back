<?php

namespace App\Models\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entities\Location;

class Flight extends Model
{   
    use Notifiable;

    protected $table = 'flight';

    protected $fillable = [
        'id',
        'code', 
        'origin_id', 
        'destiny_id', 
        'date_hour', 
    ];

    protected $hidden = ['created_at','updated_at'];

    protected $dates = ['created_at','updated_at'];

    public function origin(){
        return $this->hasOne(Location::class, 'origin_id');
    }

    public function destiny(){
        return $this->hasOne(Location::class, 'destiny_id');
    }
}

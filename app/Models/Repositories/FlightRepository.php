<?php

namespace App\Models\Repositories;

use App\Models\Entities\Flight;

class FlightRepository extends BaseRepository
{
    public function __construct(Flight $model)
    {
        $this->model = $model;
    }

    public function findByDateAndSameDestiny($destiny_id, $hour)
    {   
        return $this->model
                    ->where('destiny_id', $destiny_id)
                    ->whereDate('date_hour', $hour)
                    ->first();
    }

    public function findWithTimeDifference($date_hour_add_30, $date_hour_remove_30)
    {   
        return $this->model
                    ->whereTime('date_hour', '>=', $date_hour_remove_30)
                    ->whereTime('date_hour', '<=', $date_hour_add_30)
                    ->first();
    }
}
<?php

namespace App\Models\Repositories;

use App\Models\Entities\Location;

class LocationRepository extends BaseRepository
{
    public function __construct(Location $model)
    {
        $this->model = $model;
    }

}
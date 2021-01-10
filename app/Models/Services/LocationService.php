<?php

namespace App\Models\Services;

use App\Models\Repositories\LocationRepository;
use App\Exceptions\BusinessException;

class LocationService
{
    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function register($zip_code, $country, $city, $state)
    {   
        $location_found = $this->locationRepository->findBy('zip_code', $zip_code);
        
        if($location_found){
            throw new BusinessException("Localização já registrada.", 406);
        }

        $data = [
            'zip_code' => $zip_code,
            'country' => $country, 
            'city' => $city,
            'state' => $state, 
        ];

        $location = $this->locationRepository->create($data);

        return 'Localização criada com sucesso.';
    }

    public function getAll()
    {
        $locations = $this->locationRepository->getAll();

        if(!$locations){
            throw new BusinessException("Não há localizações registradas.", 404);
        }

        return response()->json($locations);
    }
}



<?php

namespace App\Models\Services;

use App\Models\Repositories\FlightRepository;
use App\Exceptions\BusinessException;
use Illuminate\Support\Str;

class FlightService
{
    public function __construct(FlightRepository $flightRepository)
    {
        $this->flightRepository = $flightRepository;
    }

    public function register($origin_id, $destiny_id, $date_hour)
    {   
        $this->validateFlight($origin_id, $destiny_id, $date_hour);

        $code = Str::random(8);

        $flight_found = $this->flightRepository->findBy('code', $code);
        
        if ($flight_found) {
            throw new BusinessException("Voo já registrado.", 406);
        }

        $data = [
            'code' => $code, 
            'origin_id' => $origin_id, 
            'destiny_id' => $destiny_id, 
            'date_hour' => $date_hour
        ];

        $flight = $this->flightRepository->create($data);

        return 'Voo registrado com sucesso.';
    }

    public function update($id, $origin_id, $destiny_id, $date_hour)
    {   
        $flight_found = $this->flightRepository->findBy('id', $id);
        
        if(!$flight_found){
            throw new BusinessException("Voo não encontrado.", 404);
        }

        $this->validateFlight($origin_id, $destiny_id, $date_hour);

        $data = [ 
            'origin_id' => $origin_id, 
            'destiny_id' => $destiny_id, 
            'date_hour' => $date_hour
        ];

        $flight = $this->flightRepository->update($data, $id);

        return 'Voo modificado com sucesso.';
    }

    public function getAll()
    {
        $flights = $this->flightRepository->getAllWithPagination(10);

        if(!$flights){
            throw new BusinessException("Não há voos registrados.", 404);
        }

        return response()->json($flights);
    }

    private function validateFlight($origin_id, $destiny_id, $date_hour)
    {
        // The same location for origin and destination is not possible.
        if ($origin_id == $destiny_id) {
            throw new BusinessException("Não é possível registrar um novo voo com destino e origem iguais.", 406);
        }

        // Two flights to the same destination are not possible on the same day.
        $flight_same_day_found = $this->flightRepository->findByDateAndSameDestiny($destiny_id, $date_hour);
        
        if ($flight_same_day_found) {
            throw new BusinessException("Não é possível registrar mais de 1 voo para o mesmo destino no mesmo dia.", 406);
        }

        // Each flight must be at least 30 minutes apart from the other.

        $date_hour_add_30 = date('Y-m-d H:i:s', strtotime('+31 minutes', strtotime($date_hour)));
        $date_hour_remove_30 = date('Y-m-d H:i:s', strtotime('-31 minutes', strtotime($date_hour)));
        
        $flight_with_difference_found = $this->flightRepository->findWithTimeDifference($date_hour_add_30, $date_hour_remove_30);
        
        if ($flight_with_difference_found) {
            throw new BusinessException("Cada voo deve ter no mínimo 30 minutos de diferença do outro.", 406);
        }
    }
}



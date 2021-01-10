<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Services\FlightService;
use App\Http\Requests\Flight\RegisterRequest;

class FlightController extends Controller
{
    public function __construct(FlightService $flightService)
    {
        $this->flightService = $flightService;
    }

    public function register(RegisterRequest $request)
    {
        $answer = $this->flightService->register( 
                                    $request->origin_id,
                                    $request->destiny_id,
                                    $request->date_hour
                                );

        return response()->json($answer);
    }   

    public function update($id, Request $request)
    {
        $answer = $this->flightService->update(
                                    $id, 
                                    $request->origin_id,
                                    $request->destiny_id,
                                    $request->date_hour
                                );

        return response()->json($answer);
    }

    public function getAll()
    {
        $answer = $this->flightService->getAll();

        return response()->json($answer);
    }
}

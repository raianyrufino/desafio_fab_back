<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Services\LocationService;
use App\Http\Requests\Location\RegisterRequest;

class LocationController extends Controller
{
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function register(RegisterRequest $request)
    {
        $answer = $this->locationService->register(
                                    $request->zip_code, 
                                    $request->country,
                                    $request->city,
                                    $request->state
                                );

        return response()->json($answer);
    }   

    public function getAll()
    {
        $answer = $this->locationService->getAll();

        return response()->json($answer);
    }
}

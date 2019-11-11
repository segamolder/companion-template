<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:46
 */

namespace App\Http\Controllers\API;


use App\Services\Contracts\TripsServiceContract;
use Illuminate\Http\Request;

class TripsController
{
    /**
     * @var TripsServiceContract
     */
    private $_tripsService;

    /**
     * TripsController constructor.
     * @param TripsServiceContract $_tripsService
     */
    public function __construct(TripsServiceContract $_tripsService)
    {
        $this->_tripsService = $_tripsService;
    }

    public function CreateTrip(Request $request) {
        return $this->_tripsService->CreateTrip($request->post());
    }

    public function UpdateTrip($id, Request $request) {
        return $this->_tripsService->UpdateTrip($id, $request->post());
    }

    public function GetAllPaginatedTrips($perPage) {
        return $this->_tripsService->GetAllPaginatedTrips($perPage);
    }

    public function GetSearchPaginatedTrips($perPage, Request $request) {
        return $this->_tripsService->GetSearchPaginatedTrips($perPage, $request->post());
    }

    public function GetUserCurrentTrip($userId) {
        return $this->_tripsService->GetUserCurrentTrip($userId);
    }
}

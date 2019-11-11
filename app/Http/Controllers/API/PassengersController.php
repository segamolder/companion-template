<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:45
 */

namespace App\Http\Controllers\API;


use App\Services\Contracts\PassengerServiceContract;

class PassengersController
{
    /**
     * @var PassengerServiceContract
     */
    private $_passengerService;

    /**
     * PassengersController constructor.
     * @param PassengerServiceContract $_passengerService
     */
    public function __construct(PassengerServiceContract $_passengerService)
    {
        $this->_passengerService = $_passengerService;
    }

    public function GetPassengersByTripId($tripId) {
        return $this->_passengerService->GetPassengersByTripId($tripId);
    }

    public function AddPassengerToTrip($tripId) {
        return $this->_passengerService->AddPassengerToTrip($tripId);
    }

    public function RemovePassengerFromTrip($tripId) {
        return json_encode($this->_passengerService->RemovePassengerFromTrip($tripId));
    }
}

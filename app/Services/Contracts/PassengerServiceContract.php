<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:07
 */

namespace App\Services\Contracts;


interface PassengerServiceContract
{
    public function AddPassengerToTrip($tripId);

    public function GetPassengersByTripId($tripId);

    public function RemovePassengerFromTrip($tripId);
}

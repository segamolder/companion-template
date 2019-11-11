<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:14
 */

namespace App\Repository\Contracts;


interface PassengersRepositoryContract extends BaseRepositoryContract
{
    public function GetByTripId($tripId);

    public function GetIdByTripId($tripId);

    public function GetTotalCostOfTravel($id);

    public function GetTotalNumberOfTrips($id);

    public function GetTotalKilometers($id);

    public function GetTotalDuration($id);
}

<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:08
 */

namespace App\Services\Contracts;


interface TripsServiceContract
{
    public function CreateTrip(array $data);

    public function UpdateTrip($id, array $data);

    public function GetAllPaginatedTrips($perPage);

    public function GetSearchPaginatedTrips($perPage, array $search);

    public function GetUserCurrentTrip($userId);
}

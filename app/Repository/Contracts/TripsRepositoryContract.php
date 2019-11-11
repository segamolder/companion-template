<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:14
 */

namespace App\Repository\Contracts;


interface TripsRepositoryContract extends BaseRepositoryContract
{
    public function GetAllPaginatedTrips($perPage);

    public function GetSearchPaginatedTrips($perPage, array $search);

    public function GetCurrentUserTrip($userId);

}

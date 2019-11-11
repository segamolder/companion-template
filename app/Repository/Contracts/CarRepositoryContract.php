<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:11
 */

namespace App\Repository\Contracts;


interface CarRepositoryContract extends BaseRepositoryContract
{
    public function getCarByUserId($userId);

    public function GetTotalCostOfTravel($userId);

    public function GetTotalNumberOfTrips($userId);

    public function GetTotalKilometers($userId);

    public function GetTotalDuration($userId);

    public function GetCarImage();
}

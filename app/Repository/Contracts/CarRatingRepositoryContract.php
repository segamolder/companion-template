<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:13
 */

namespace App\Repository\Contracts;


interface CarRatingRepositoryContract extends BaseRepositoryContract
{

    public function GetAverageRating($carId);

    public function GetRatingByCarId($carId);
}

<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:17
 */

namespace App\Repository\Eloquent;


use App\Models\CarRating;
use App\Repository\Contracts\CarRatingRepositoryContract;

class CarRatingRepository extends BaseRepository implements CarRatingRepositoryContract
{
    /**
     * CarRatingRepository constructor.
     * @param CarRating $carRating
     */
    public function __construct(CarRating $carRating)
    {
        $this->model = $carRating;
    }

    public function GetAverageRating($carId)
    {
        return $this->model->where("car_id", $carId)->avg("rating");
    }

    public function GetRatingByCarId($carId)
    {
        return $this->model->where("car_id", $carId)->get();
    }
}

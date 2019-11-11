<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:16
 */

namespace App\Repository\Eloquent;


use App\Models\Car;
use App\Repository\Contracts\CarRepositoryContract;
use Illuminate\Support\Facades\Auth;

class CarRepository extends BaseRepository implements CarRepositoryContract
{
    /**
     * CarRepository constructor.
     * @param Car $car
     */
    public function __construct(Car $car)
    {
        $this->model = $car;
    }

    public function getCarByUserId($userId)
    {
        return $this->model->where('user_id', $userId)->first();
    }

    public function GetTotalCostOfTravel($userId)
    {
        return $this->model->where('driver_id', $userId)->sum('price');
    }

    public function GetTotalNumberOfTrips($userId)
    {
        return $this->model->where('driver_id', $userId)->count();
    }

    public function GetTotalKilometers($userId)
    {
        return $this->model->where('driver_id', $userId)->sum('distance');
    }

    public function GetTotalDuration($userId)
    {
        return $this->model->where('driver_id', $userId)->sum('duration');
    }

    public function GetCarImage()
    {
        return $this->model->where("user_id", Auth::id())->first()->image;

    }
}

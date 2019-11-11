<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:18
 */

namespace App\Repository\Eloquent;


use App\Models\Passengers;
use App\Repository\Contracts\PassengersRepositoryContract;
use Illuminate\Support\Facades\Auth;

class PassengersRepository extends BaseRepository implements PassengersRepositoryContract
{
    /**
     * PassengersRepository constructor.
     * @param Passengers $passengers
     */
    public function __construct(Passengers $passengers)
    {
        $this->model = $passengers;
    }

    public function GetByTripId($tripId)
    {
        return $this->model->where("trip_id", $tripId)->get();
    }

    public function GetIdByTripId($tripId)
    {
        $temp = $this->model->where("trip_id", $tripId)->where("user_id", Auth::id())->first();
        return $temp->id;
    }

    public function GetTotalCostOfTravel($id)
    {
        return $this->model->where("user_id", $id)->join('trips', 'trips.id', 'passengers.trip_id')->sum("price");
    }

    public function GetTotalNumberOfTrips($id)
    {
        return $this->model->where("user_id", $id)->count();
    }

    public function GetTotalKilometers($id)
    {
        return $this->model->where("user_id", $id)->join('trips', 'trips.id', 'passengers.trip_id')->sum("distance");
    }

    public function GetTotalDuration($id)
    {
        return $this->model->where("user_id", $id)->join('trips', 'trips.id', 'passengers.trip_id')->sum("duration");
    }
}

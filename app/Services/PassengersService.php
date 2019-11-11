<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:03
 */

namespace App\Services;


use App\Repository\Contracts\PassengersRepositoryContract;
use App\Repository\Contracts\TripsRepositoryContract;
use App\Services\Contracts\PassengerServiceContract;
use Illuminate\Support\Facades\Auth;

class PassengersService extends BaseService implements PassengerServiceContract
{
    /**
     * @var PassengersRepositoryContract
     */
    private $_passengersRepo;
    /**
     * @var TripsRepositoryContract
     */
    private $_tripRepo;

    /**
     * PassengersService constructor.
     * @param PassengersRepositoryContract $_passengersRepo
     * @param TripsRepositoryContract $_tripRepo
     */
    public function __construct(PassengersRepositoryContract $_passengersRepo, TripsRepositoryContract $_tripRepo)
    {
        $this->_passengersRepo = $_passengersRepo;
        $this->_tripRepo = $_tripRepo;
    }

    public function AddPassengerToTrip($tripId)
    {
        if ($this->_tripRepo->getById($tripId)->driver_id != Auth::id()) {
            return $this->_passengersRepo->create(["user_id" => Auth::id(), "trip_id" => $tripId]);
        }
        else {
            return response()->json(array('error' => "Нельзя забронировать свою поездку"), -1);
        }
    }

    public function GetPassengersByTripId($tripId)
    {
        return $this->_passengersRepo->GetByTripId($tripId);
    }

    public function RemovePassengerFromTrip($tripId)
    {
        $id = $this->_passengersRepo->GetIdByTripId($tripId);
        return $this->_passengersRepo->delete($id);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:04
 */

namespace App\Services;


use App\Repository\Contracts\TripsRepositoryContract;
use App\Services\Contracts\TripsServiceContract;

class TripsService extends BaseService implements TripsServiceContract
{
    /**
     * @var TripsRepositoryContract
     */
    private $_tripRepo;

    /**
     * TripsService constructor.
     * @param TripsRepositoryContract $_tripRepo
     */
    public function __construct(TripsRepositoryContract $_tripRepo)
    {
        $this->_tripRepo = $_tripRepo;
    }

    public function CreateTrip(array $data)
    {
        return $this->_tripRepo->create($data);
    }

    public function UpdateTrip($id, array $data)
    {
        return $this->_tripRepo->update($id, $data);
    }

    public function GetAllPaginatedTrips($perPage)
    {
        return $this->_tripRepo->GetAllPaginatedTrips($perPage);
    }

    public function GetSearchPaginatedTrips($perPage, array $search)
    {
        return $this->_tripRepo->GetSearchPaginatedTrips($perPage, $search);
    }

    public function GetUserCurrentTrip($userId)
    {
        return $this->_tripRepo->GetCurrentUserTrip($userId);
    }
}

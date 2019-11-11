<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:01
 */

namespace App\Services;


use App\Repository\Contracts\CarBodyTypeRepositoryContract;
use App\Repository\Contracts\CarCommentsRepositoryContract;
use App\Repository\Contracts\CarMarkRepositoryContract;
use App\Repository\Contracts\CarModelRepositoryContract;
use App\Repository\Contracts\CarRatingRepositoryContract;
use App\Repository\Contracts\CarRepositoryContract;
use App\Repository\Contracts\TripsRepositoryContract;
use App\Services\Contracts\CarServiceContract;
use Illuminate\Support\Facades\Auth;

class CarService extends BaseService implements CarServiceContract
{
    /**
     * @var CarBodyTypeRepositoryContract
     */
    private $_carBodyTypeRepo;
    /**
     * @var CarModelRepositoryContract
     */
    private $_carModelRepo;
    /**
     * @var CarMarkRepositoryContract
     */
    private $_carMarkRepo;
    /**
     * @var CarRepositoryContract
     */
    private $_carRepo;
    /**
     * @var CarCommentsRepositoryContract
     */
    private $_carCommentsRepo;
    /**
     * @var CarRatingRepositoryContract
     */
    private $_carRatingRepo;
    /**
     * @var TripsRepositoryContract
     */
    private $_tripRepo;

    /**
     * CarService constructor.
     * @param CarRepositoryContract $_carRepo
     * @param CarBodyTypeRepositoryContract $_carBodyTypeRepo
     * @param CarModelRepositoryContract $_carModelRepo
     * @param CarMarkRepositoryContract $_carMarkRepo
     * @param CarCommentsRepositoryContract $_carCommentsRepo
     * @param CarRatingRepositoryContract $_carRatingRepo
     * @param TripsRepositoryContract $_tripRepo
     */
    public function __construct(
        CarRepositoryContract $_carRepo,
        CarBodyTypeRepositoryContract $_carBodyTypeRepo,
        CarModelRepositoryContract $_carModelRepo,
        CarMarkRepositoryContract $_carMarkRepo,
        CarCommentsRepositoryContract $_carCommentsRepo,
        CarRatingRepositoryContract $_carRatingRepo,
        TripsRepositoryContract $_tripRepo)
    {
        $this->_carBodyTypeRepo = $_carBodyTypeRepo;
        $this->_carModelRepo = $_carModelRepo;
        $this->_carMarkRepo = $_carMarkRepo;
        $this->_carRepo = $_carRepo;
        $this->_carCommentsRepo = $_carCommentsRepo;
        $this->_carRatingRepo = $_carRatingRepo;
        $this->_tripRepo = $_tripRepo;
    }

    public function GetCarBodyTypes()
    {
        return $this->_carBodyTypeRepo->all();
    }

    public function GetCarMarks()
    {
        return $this->_carMarkRepo->all();
    }

    public function GetCarModels($markId)
    {
        return $this->_carModelRepo->GetModelsByMark($markId);
    }

    public function UpdateCarInfo($userId, array $data)
    {
        $carId = $this->_carRepo->getCarByUserId($userId)->id;
        return $this->_carRepo->update($carId, $data);
    }

    public function GetCarInfo($userId) {
        return $this->_carRepo->getCarByUserId($userId);
    }

    public function CreateCarInfo($userId)
    {
        return $this->_carRepo->create(["user_id"=>$userId]);
    }

    public function AddCommentToCar($carId, $text)
    {
        $currentUserCarId = $this->_carRepo->getById($carId)->user_id;
        if ($currentUserCarId != Auth::id()) {
            return $this->_carCommentsRepo->create(["car_id" => $carId, "text" => $text, "user_from_id" => Auth::id()]);
        }
        else {
            return response()->json(array('error' => "Нельзя добавить комментарий своей машине", "status"=>-1), 500);
        }
    }

    public function SetCarRating($carId, $rating)
    {
        $currentUserCarId = $this->_carRepo->getById($carId)->user_id;
        if ($currentUserCarId != Auth::id()) {
            return $this->_carRatingRepo->create(["car_id" => $carId, "rating" => $rating, "user_from_id" => Auth::id()]);
        }
        else {
            return response()->json(array('error' => "Нельзя добавить комментарий своей машине", "status"=>-1), 500);
        }
    }

    public function GetAverageRating($carId)
    {
        return intval($this->_carRatingRepo->GetAverageRating($carId));
    }

    public function GetCarRating($carId)
    {
        return $this->_carRatingRepo->GetRatingByCarId($carId);
    }

    public function GetCarComments($carId)
    {
        return $this->_carCommentsRepo->GetCommentsByCarId($carId);
    }

    public function GetDriverStatistic($userId)
    {
        $totalCostOfTravel = $this->_carRepo->GetTotalCostOfTravel($userId);
        $totalNumberOfTrips = $this->_carRepo->GetTotalNumberOfTrips($userId);
        $totalKilometers = intval($this->_carRepo->GetTotalKilometers($userId)/1000);
        $totalDuration = intval(floor($this->_carRepo->GetTotalDuration($userId)/3600));
        return response()->json(array(
            'totalCostOfTravel' => $totalCostOfTravel,
            'totalNumberOfTrips'=>$totalNumberOfTrips,
            'totalKilometers'=>$totalKilometers,
            'totalDuration'=>$totalDuration
        ), 200);
    }

    public function GetCarImage()
    {
        return $this->_carRepo->GetCarImage();
    }
}

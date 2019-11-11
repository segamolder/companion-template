<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:45
 */

namespace App\Http\Controllers\API;


use App\Services\Contracts\CarServiceContract;
use App\Services\Contracts\FileServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController
{
    /**
     * @var CarServiceContract
     */
    private $_carService;
    /**
     * @var FileServiceContract
     */
    private $_fileService;

    /**
     * CarController constructor.
     * @param CarServiceContract $_carService
     * @param FileServiceContract $_fileService
     */
    public function __construct(CarServiceContract $_carService, FileServiceContract $_fileService)
    {
        $this->_carService = $_carService;
        $this->_fileService = $_fileService;
    }

    public function GetCarInfoByUserId($userId)
    {
        return $this->_carService->GetCarInfo($userId);
    }

    public function UpdateCarInfoByUserId($userId, Request $request)
    {
        return $this->_carService->UpdateCarInfo($userId, $request->post());
    }

    public function GetCarBodyTypes()
    {
        return $this->_carService->GetCarBodyTypes();
    }

    public function GetCarMarks()
    {
        return $this->_carService->GetCarMarks();
    }

    public function GetModelsByMarkId($markId)
    {
        return $this->_carService->GetCarModels($markId);
    }

    public function GetDriverStatistic($userId)
    {
        return $this->_carService->GetDriverStatistic($userId);
    }

    public function GetCarComments($carId)
    {
        return $this->_carService->GetCarComments($carId);
    }

    public function GetCarRating($carId)
    {
        return $this->_carService->GetCarRating($carId);
    }

    public function SetCarRating($carId, Request $request) {
        $data = $request->post();
        return $this->_carService->SetCarRating($carId, $data["rating"]);
    }

    public function AddCarComment($carId, Request $request) {
        $data = $request->post();
        return $this->_carService->AddCommentToCar($carId, $data["text"]);
    }

    public function GetAverageRating($carId) {
        return $this->_carService->GetAverageRating($carId);
    }

    public function SaveImage(Request $request)
    {
        try {
            $imagePath = $this->_fileService->saveCarImage($request);
            $this->_carService->UpdateCarInfo(Auth::id(), ["image" => str_replace('public/', '/storage/',$imagePath)]);
        } catch (\Exception $exception) {
            return response()->json(array('error' => $exception), 500);
        }
    }

    public function GetCarImage() {
        return $this->_carService->GetCarImage();
    }
}

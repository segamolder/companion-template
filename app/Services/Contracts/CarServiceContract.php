<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:07
 */

namespace App\Services\Contracts;


interface CarServiceContract
{
    public function GetCarBodyTypes();

    public function GetCarMarks();

    public function GetCarModels($markId);

    public function UpdateCarInfo($userId, array $data);

    public function GetCarInfo($userId);

    public function CreateCarInfo($userId);

    public function AddCommentToCar($carId, $text);

    public function SetCarRating($carId, $rating);

    public function GetAverageRating($carId);

    public function GetCarRating($carId);

    public function GetCarComments($carId);

    public function GetDriverStatistic($userId);

    public function GetCarImage();
}

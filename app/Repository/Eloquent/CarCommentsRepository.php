<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:17
 */

namespace App\Repository\Eloquent;


use App\Models\CarComments;
use App\Repository\Contracts\CarCommentsRepositoryContract;

class CarCommentsRepository extends BaseRepository implements CarCommentsRepositoryContract
{
    /**
     * CarCommentsRepository constructor.
     * @param CarComments $carComments
     */
    public function __construct(CarComments $carComments)
    {
        $this->model = $carComments;
    }

    public function GetCommentsByCarId($carId)
    {
        return $this->model->where("car_id", $carId)->get();
    }
}

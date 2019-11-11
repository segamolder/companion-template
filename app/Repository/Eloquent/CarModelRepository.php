<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:17
 */

namespace App\Repository\Eloquent;


use App\Models\CarModel;
use App\Repository\Contracts\CarModelRepositoryContract;

class CarModelRepository extends BaseRepository implements CarModelRepositoryContract
{
    /**
     * CarModelRepository constructor.
     * @param CarModel $carModel
     */
    public function __construct(CarModel $carModel)
    {
        $this->model = $carModel;
    }

    public function GetModelsByMark($markId)
    {
        return $this->model->where('mark_id', $markId)->get();
    }
}

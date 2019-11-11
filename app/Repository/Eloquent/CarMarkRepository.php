<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:17
 */

namespace App\Repository\Eloquent;


use App\Models\CarMark;
use App\Repository\Contracts\CarMarkRepositoryContract;

class CarMarkRepository extends BaseRepository implements CarMarkRepositoryContract
{
    /**
     * CarMarkRepository constructor.
     * @param CarMark $carMark
     */
    public function __construct(CarMark $carMark)
    {
        $this->model = $carMark;
    }

}

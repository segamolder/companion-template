<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:16
 */

namespace App\Repository\Eloquent;


use App\Models\CarBodyType;
use App\Repository\Contracts\CarBodyTypeRepositoryContract;

class CarBodyTypeRepository extends BaseRepository implements CarBodyTypeRepositoryContract
{
    /**
     * CarBodyTypeRepository constructor.
     * @param CarBodyType $carBodyType
     */
    public function __construct(CarBodyType $carBodyType)
    {
        $this->model = $carBodyType;
    }
}

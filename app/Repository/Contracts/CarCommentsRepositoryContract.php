<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:12
 */

namespace App\Repository\Contracts;


interface CarCommentsRepositoryContract extends BaseRepositoryContract
{

    public function GetCommentsByCarId($carId);
}

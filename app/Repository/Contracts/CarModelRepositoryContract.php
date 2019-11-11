<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:13
 */

namespace App\Repository\Contracts;


interface CarModelRepositoryContract extends BaseRepositoryContract
{
    public function GetModelsByMark($markId);
}

<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:15
 */

namespace App\Repository\Contracts;


interface UsersRatingRepositoryContract extends BaseRepositoryContract
{
    public function GetRatingByUserId($id);

    public function GetAverageRating($id);
}

<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:18
 */

namespace App\Repository\Eloquent;


use App\Models\UsersRating;
use App\Repository\Contracts\UsersRatingRepositoryContract;

class UsersRatingRepository extends BaseRepository implements UsersRatingRepositoryContract
{
    /**
     * UsersRatingRepository constructor.
     * @param UsersRating $usersRating
     */
    public function __construct(UsersRating $usersRating)
    {
        $this->model = $usersRating;
    }

    public function GetRatingByUserId($id)
    {
        return $this->model->where("user_id", $id)->get();
    }

    public function GetAverageRating($id)
    {
        return $this->model->where("user_id", $id)->avg("rating");
    }
}

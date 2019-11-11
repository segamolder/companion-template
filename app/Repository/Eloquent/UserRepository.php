<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 04.11.2019
 * Time: 22:57
 */

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Contracts\UserRepositoryContract;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    /**
     * UserRepository constructor.
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
        $this->model = $userModel;
    }

    public function GetUserImage()
    {
        return $this->model->where("id", Auth::id())->first()->user_image;
    }
}

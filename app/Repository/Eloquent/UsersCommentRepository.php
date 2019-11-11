<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:18
 */

namespace App\Repository\Eloquent;


use App\Models\UsersComment;
use App\Repository\Contracts\UsersCommentRepositoryContract;

class UsersCommentRepository extends BaseRepository implements UsersCommentRepositoryContract
{
    /**
     * UsersCommentRepository constructor.
     * @param UsersComment $usersComment
     */
    public function __construct(UsersComment $usersComment)
    {
        $this->model = $usersComment;
    }

    public function GetCommentsByUserId($id)
    {
        return $this->model->where("user_id", $id)->get();
    }
}

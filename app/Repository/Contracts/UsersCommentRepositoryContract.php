<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:15
 */

namespace App\Repository\Contracts;


interface UsersCommentRepositoryContract extends BaseRepositoryContract
{
    public function GetCommentsByUserId($id);
}

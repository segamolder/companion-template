<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:00
 */

namespace App\Services\Contracts;


interface UserServiceContract
{
    public function GetUserInfo($userId);

    public function UpdateUserInfo($userId, array $attr);

    public function UpdatePassword($userId, array $data);

    public function SetUserRating($toUserId, $rating);

    public function AddCommentToUser($toUserId, $text);

    public function GetUserComments($userId);

    public function GetUserRating($id);

    public function GetAverageRating($id);

    public function GetUserStatistic($id);

    public function GetUserImage();
}

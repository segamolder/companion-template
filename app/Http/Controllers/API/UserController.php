<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 04.11.2019
 * Time: 23:00
 */

namespace App\Http\Controllers\API;


use App\Services\Contracts\FileServiceContract;
use App\Services\Contracts\UserServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{

    /**
     * @var UserServiceContract
     */
    private $_userService;
    /**
     * @var FileServiceContract
     */
    private $_fileService;

    /**
     * UserController constructor.
     * @param UserServiceContract $_userService
     * @param FileServiceContract $_fileService
     */
    public function __construct(UserServiceContract $_userService, FileServiceContract $_fileService)
    {
        $this->_userService = $_userService;
        $this->_fileService = $_fileService;
    }

    public function GetUserInfo($id)
    {
        return $this->_userService->GetUserInfo($id);
    }

    public function UpdateUserInfo(Request $request)
    {
        return $this->_userService->UpdateUserInfo(Auth::id(), $request->all());
    }

    public function UpdatePassword(Request $request)
    {
        if (Auth::check()) {
            return $this->_userService->UpdatePassword(Auth::id(), $request->post());
        } else {
            return response()->json(array('error' => "Не авторизован"), 201);
        }
    }

    public function GetUserStatistic($id)
    {
        return $this->_userService->GetUserStatistic($id);
    }

    public function GetUserRating($id)
    {
        return $this->_userService->GetUserRating($id);
    }

    public function GetUsersComments($id)
    {
        return $this->_userService->GetUserComments($id);
    }

    public function SetUserRating($id, Request $request) {
        $data = $request->post();
        return $this->_userService->SetUserRating($id, $data["rating"]);
    }

    public function AddCommentToUser($id, Request $request) {
        $data = $request->post();
        return $this->_userService->AddCommentToUser($id, $data["text"]);
    }

    public function GetAverageRating($id) {
        return $this->_userService->GetAverageRating($id);
    }

    public function SaveImage(Request $request)
    {
        try {
            $imagePath = $this->_fileService->saveUserImage($request);
            $this->_userService->UpdateUserInfo(Auth::id(), ["user_image" => str_replace('public/', '/storage/',$imagePath)]);
        } catch (\Exception $exception) {
            return response()->json(array('error' => $exception), 500);
        }
    }

    public function GetUserImage() {
        return $this->_userService->GetUserImage();
    }
}

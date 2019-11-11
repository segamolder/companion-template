<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 08.11.2019
 * Time: 0:23
 */

namespace App\Services;


use App\Services\Contracts\FileServiceContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileService implements FileServiceContract
{
    public function saveUserImage($file) {
        return $file->user->storeAs('public/users/user_'.Auth::id(), date('Ymdhms').'profile.'.$file->user->getClientOriginalExtension());
    }

    public function saveCarImage($file) {
        return $file->car->storeAs('public/users/user_'.Auth::id(), date('Ymdhms').'car.'.$file->car->getClientOriginalExtension());
    }
}

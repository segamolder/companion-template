<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 08.11.2019
 * Time: 0:23
 */

namespace App\Services\Contracts;


interface FileServiceContract
{
    public function saveUserImage($file);

    public function saveCarImage($file);
}

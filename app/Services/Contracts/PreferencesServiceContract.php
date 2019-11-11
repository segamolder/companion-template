<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:08
 */

namespace App\Services\Contracts;


interface PreferencesServiceContract
{
    public function UpdateUserPreferences($id, array $attr);

    public function CreateUserPreferences($userId);

    public function GetByUserId($userId);
}

<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:14
 */

namespace App\Repository\Contracts;


interface PreferencesRepositoryContract extends BaseRepositoryContract
{
    public function getByUserId(int $id);
}

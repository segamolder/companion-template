<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:18
 */

namespace App\Repository\Eloquent;


use App\Models\Preferences;
use App\Repository\Contracts\PreferencesRepositoryContract;

class PreferencesRepository extends BaseRepository implements PreferencesRepositoryContract
{
    /**
     * PreferencesRepository constructor.
     * @param Preferences $preferences
     */
    public function __construct(Preferences $preferences)
    {
        $this->model = $preferences;
    }

    public function getByUserId(int $id)
    {
        return $this->model->where("user_id", $id)->first();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:03
 */

namespace App\Services;


use App\Repository\Contracts\PreferencesRepositoryContract;
use App\Services\Contracts\PreferencesServiceContract;

class PreferencesService extends BaseService implements PreferencesServiceContract
{
    /**
     * @var PreferencesRepositoryContract
     */
    private $_preferencesRepo;

    /**
     * PreferencesService constructor.
     * @param PreferencesRepositoryContract $_preferencesRepo
     */
    public function __construct(PreferencesRepositoryContract $_preferencesRepo)
    {
        $this->_preferencesRepo = $_preferencesRepo;
    }

    public function UpdateUserPreferences($id, array $attr)
    {
        $preferences = $this->_preferencesRepo->getByUserId($id);
        return $this->_preferencesRepo->update($preferences->id, $attr);
    }

    public function CreateUserPreferences($userId) {
        $this->_preferencesRepo->create(["user_id"=>$userId]);
    }

    public function GetByUserId($userId)
    {
        $preferences = $this->_preferencesRepo->getByUserId($userId);
        return $this->_preferencesRepo->getById($preferences->id);
    }
}

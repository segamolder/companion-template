<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:46
 */

namespace App\Http\Controllers\API;


use App\Services\Contracts\PreferencesServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreferencesController
{
    /**
     * @var PreferencesServiceContract
     */
    private $_preferencesService;

    /**
     * PreferencesController constructor.
     * @param PreferencesServiceContract $_preferencesService
     */
    public function __construct(PreferencesServiceContract $_preferencesService)
    {
        $this->_preferencesService = $_preferencesService;
    }

    public function GetPreferencesByUserId($id) {
        return $this->_preferencesService->GetByUserId($id);
    }

    public function UpdatePreferencesByUserId(Request $request) {
        return $this->_preferencesService->UpdateUserPreferences(Auth::id(), $request->post());
    }
}

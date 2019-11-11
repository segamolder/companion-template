<?php
/**
 * Created by PhpStorm.
 * User: molde
 * Date: 05.11.2019
 * Time: 0:00
 */

namespace App\Services;


use App\Repository\Contracts\PassengersRepositoryContract;
use App\Repository\Contracts\TripsRepositoryContract;
use App\Repository\Contracts\UserRepositoryContract;
use App\Repository\Contracts\UsersCommentRepositoryContract;
use App\Repository\Contracts\UsersRatingRepositoryContract;
use App\Services\Contracts\TripsServiceContract;
use App\Services\Contracts\UserServiceContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService extends BaseService implements UserServiceContract
{
    /**
     * @var UserRepositoryContract
     */
    private $_userRepo;
    /**
     * @var UsersRatingRepositoryContract
     */
    private $_userRatingRepo;
    /**
     * @var UsersCommentRepositoryContract
     */
    private $_userCommentsRepo;
    /**
     * @var TripsRepositoryContract
     */
    private $_tripRepo;
    /**
     * @var PassengersRepositoryContract
     */
    private $_passengerRepo;

    /**
     * UserService constructor.
     * @param UserRepositoryContract $_userRepo
     * @param UsersRatingRepositoryContract $_userRatingRepo
     * @param UsersCommentRepositoryContract $_userCommentsRepo
     * @param TripsRepositoryContract $_tripRepo
     * @param PassengersRepositoryContract $_passengerRepo
     */
    public function __construct(
        UserRepositoryContract $_userRepo,
        UsersRatingRepositoryContract $_userRatingRepo,
        UsersCommentRepositoryContract $_userCommentsRepo,
        TripsRepositoryContract $_tripRepo,
        PassengersRepositoryContract $_passengerRepo)
    {
        $this->_userRepo = $_userRepo;
        $this->_userRatingRepo = $_userRatingRepo;
        $this->_userCommentsRepo = $_userCommentsRepo;
        $this->_tripRepo = $_tripRepo;
        $this->_passengerRepo = $_passengerRepo;
    }

    public function GetUserInfo($userId)
    {
        return $this->_userRepo->getById($userId);
    }


    public function UpdateUserInfo($userId, array $attr)
    {
        return $this->_userRepo->update($userId, $attr);
    }

    public function UpdatePassword($userId, $data)
    {
        $messages = [
            'old.required' => 'Не введён текущий пароль',
            'new.required' => 'Не введен новый пароль',
        ];

        $validator = Validator::make($data, [
            'old' => 'required',
            'new' => 'required|same:new|min:8',
            'new_repeat' => 'required|same:new|min:8',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        } else {
            $current_password = Auth::User()->password;
            if (Hash::check($data['old'], $current_password)) {
                $user_id = Auth::User()->id;
                $obj_user = $this->GetUserInfo($user_id);
                $obj_user->password = Hash::make($data['new']);;
                $obj_user->save();
                return response()->json(array('success' => "Ok"), 200);
            } else {
                $error = array('old' => 'Не верный текущий пароль');
                return response()->json(array('error' => $error), 400);
            }
        }
    }

    public function SetUserRating($toUserId, $rating)
    {
        if (Auth::id() != $toUserId) {
            return $this->_userRatingRepo->create(["user_id" => $toUserId, "rating" => $rating, "user_from_id" => Auth::id()]);
        }
        else {
            return response()->json(array('error' => "Нельзя поставить себе оценку", "status"=>-1), 500);
        }
    }

    public function AddCommentToUser($toUserId, $text)
    {
        if (Auth::id() != $toUserId) {
            return $this->_userCommentsRepo->create(["user_id" => $toUserId, "text" => $text, "user_from_id" => Auth::id()]);
        }
        else {
            return response()->json(array('error' => "Нельзя добавить себе комментарий", "status"=>-1), 500);
        }
    }

    public function GetUserComments($userId)
    {
        return $this->_userCommentsRepo->GetCommentsByUserId($userId);
    }

    public function GetUserRating($id)
    {
        return $this->_userRatingRepo->GetRatingByUserId($id);
    }

    public function GetAverageRating($id)
    {
        return intval($this->_userRatingRepo->GetAverageRating($id));
    }

    public function GetUserStatistic($id)
    {
        $totalCostOfTravel = $this->_passengerRepo->GetTotalCostOfTravel($id);
        $totalNumberOfTrips = $this->_passengerRepo->GetTotalNumberOfTrips($id);
        $totalKilometers = intval($this->_passengerRepo->GetTotalKilometers($id)/1000);
        $totalDuration = intval(floor($this->_passengerRepo->GetTotalDuration($id)/3600));
        return response()->json(array(
            'totalCostOfTravel' => $totalCostOfTravel,
            'totalNumberOfTrips'=>$totalNumberOfTrips,
            'totalKilometers'=>$totalKilometers,
            'totalDuration'=>$totalDuration
        ), 200);
    }

    public function GetUserImage()
    {
        return $this->_userRepo->GetUserImage();
    }
}

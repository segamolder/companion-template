<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $lastname
 * @property string $email
 * @property string $email_token
 * @property boolean $is_email_verified
 * @property string $email_verified_at
 * @property string $password
 * @property string $vk_id
 * @property string $user_image
 * @property string $phone_number
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Car[] $cars
 * @property CarComments[] $carComments
 * @property Passengers[] $passengers
 * @property Preferences[] $preferences
 * @property Trips[] $trips
 * @property UsersComment[] $usersFromComments
 * @property UsersComment[] $usersComments
 * @property UsersRating[] $usersFromRatings
 * @property UsersRating[] $usersRatings
 */
class User extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'surname', 'lastname', 'email', 'email_token', 'is_email_verified', 'email_verified_at', 'password', 'vk_id', 'user_image', 'phone_number', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cars()
    {
        return $this->hasMany('App\Models\Car');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carComments()
    {
        return $this->hasMany('App\Models\CarComments', 'user_from_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function passengers()
    {
        return $this->hasMany('App\Models\Passengers');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preferences()
    {
        return $this->hasMany('App\Models\Preferences');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trips()
    {
        return $this->hasMany('App\Models\Trips', 'driver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersFromComments()
    {
        return $this->hasMany('App\Models\UsersComment', 'user_from_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersComments()
    {
        return $this->hasMany('App\Models\UsersComment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersFromRatings()
    {
        return $this->hasMany('App\Models\UsersRating', 'user_from_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersRatings()
    {
        return $this->hasMany('App\Models\UsersRating');
    }
}

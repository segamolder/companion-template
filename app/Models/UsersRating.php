<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_from_id
 * @property int $rating
 * @property string $created_at
 * @property string $updated_at
 * @property User $userFrom
 * @property User $user
 */
class UsersRating extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_rating';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'user_from_id', 'rating', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userFrom()
    {
        return $this->belongsTo('App\Models\User', 'user_from_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

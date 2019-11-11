<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $car_body_type_id
 * @property integer $car_model_id
 * @property string $image
 * @property int $driving_experience
 * @property string $car_number
 * @property string $created_at
 * @property string $updated_at
 * @property CarBodyType $carBodyType
 * @property CarModel $carModel
 * @property User $user
 * @property CarComments[] $carComments
 * @property CarRating[] $carRatings
 */
class Car extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'car_body_type_id', 'car_model_id', 'image', 'driving_experience', 'car_number', 'created_at', 'updated_at', 'car_mark_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carBodyType()
    {
        return $this->belongsTo('App\Models\CarBodyType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carModel()
    {
        return $this->belongsTo('App\Models\CarModel');
    }

    public function carMark()
    {
        return $this->belongsTo('App\Models\CarMark');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carComments()
    {
        return $this->hasMany('App\Models\CarComments');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carRatings()
    {
        return $this->hasMany('App\Models\CarRating');
    }
}

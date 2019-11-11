<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $car_id
 * @property int $rating
 * @property string $created_at
 * @property string $updated_at
 * @property Car $car
 */
class CarRating extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'car_rating';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['car_id', 'rating', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
}

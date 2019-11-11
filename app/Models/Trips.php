<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $driver_id
 * @property string $where_from
 * @property string $where_to
 * @property string $departure_time
 * @property int $free_places
 * @property int $price
 * @property float $distance
 * @property float $duration
 * @property boolean $no_more_than_two_passengers
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Passengers[] $passengers
 */
class Trips extends Model
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
    protected $fillable = ['driver_id', 'where_from', 'where_to', 'departure_time', 'free_places', 'price', 'distance', 'duration', 'no_more_than_two_passengers', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'driver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function passengers()
    {
        return $this->hasMany('App\Models\Passengers');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $body_type
 * @property string $created_at
 * @property string $updated_at
 * @property Car[] $cars
 */
class CarBodyType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'car_body_type';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['body_type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cars()
    {
        return $this->hasMany('App\Models\Car');
    }
}

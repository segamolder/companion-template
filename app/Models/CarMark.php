<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $mark_name
 * @property string $created_at
 * @property string $updated_at
 * @property CarModel[] $carModels
 */
class CarMark extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'car_mark';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['mark_name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carModels()
    {
        return $this->hasMany('App\Models\CarModel', 'mark_id');
    }
}

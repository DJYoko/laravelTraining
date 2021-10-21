<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/*
 * Class CircleMember
 * @package App\Models
 *
 * @property int id
 * @property int user_id
 * @property int circle_id
 * @property int role
 * @property Carbon created_at
 * @property Carbon updated_at
 */

class CircleMember extends Model
{
    protected $tables = 'circle_members';

    protected $fillable = [
        'user_id',
        'circle_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'circle_id'=> 'int',
        'user_id'=> 'int',
        'role'=> 'int',
    ];

    /**
     * blank field filled as Null
     */
    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            foreach ($model->attributes as $key => $value) {
                // accept Zero("0") on Numeric & Text field
                if ($value !== 0) {
                    $model->{$key} = empty($value) ? null : $value;
                }
            }
        });
    }
}

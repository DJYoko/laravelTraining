<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/*
 * Class Circle
 * @package App\Models
 *
 * @property int id
 * @property int create_user_id
 * @property string name
 * @property text path
 * @property text thumbnail_path
 * @property Carbon start_at
 * @property Carbon end_at
 * @property Carbon created_at
 * @property Carbon updated_at
 */

class Circle extends Model
{
    protected $tables = 'circles';

    protected $fillable = [
        'name',
        'path',
        'thumbnail_path',
        'create_user_id',
        'start_at',
        'end_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'path'=> 'string',
        'thumbnail_path'=> 'string',
        'create_user_id'=> 'int'
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

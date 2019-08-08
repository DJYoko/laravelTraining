<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/*
 * Class Vote
 * @package App\Models
 *
 * @property int id
 * @property int user_id
 * @property string name
 * @property text description
 * @property Carbon start_at
 * @property Carbon end_at
 * @property Carbon created_at
 * @property Carbon updated_at
 */

class Vote extends Model
{
    protected $tables = 'votes';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'start_at',
        'end_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'user_id'=> 'int',
        'name' => 'string',
        'description'=> 'text'
    ];

    /**
     * blank field becomes Null
     */
    public static function boot()
    {
        parent::boot();
        static::saving( function ( $model ) {
            foreach ( $model->attributes as $key => $value ) {
                // accept Zero("0") on Numeric & Text field
                if( $value != 0 ) {
                    $model->{$key} = empty( $value ) ? null : $value;
                }
            }
        } );
    }
}

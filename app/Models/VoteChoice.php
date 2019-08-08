<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/*
 * Class VoteChoice
 * @package  App\Models
 *
 * @property int id
 * @property int vote_id
 * @property string name
 * @property Carbon created_at
 * @property Carbon updated_at
*/

class VoteChoice extends Model
{
    protected $tables = 'vote_choices';

    protected $fillable = [
        'vote_id',
        'name'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'vote_id'=> 'int',
        'name' => 'text'
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

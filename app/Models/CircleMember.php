<?php

namespace App\Models;

use Carbon\Carbon;
use App\Enum\CircleMemberRole;
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
        'role'=> 'string', // Enum CircleMemberRole
    ];

    public static function isEditable(int $circleId, int $userId)
    {
        $matchedMembers = CircleMember::where('circle_members.circle_id', '=', $circleId)
            ->where('circle_members.user_id', '=', $userId)
            ->get();

        // 当該サークルメンバー自体が不在の場合は false
        if ($matchedMembers->isEmpty()) {
            return false;
        }

        $theMemberRole = $matchedMembers[0]->role;

        $editableRoleList = [
            CircleMemberRole::OWNER()
            // その他にも編集可能なrole種類が増えたらこの配列を増やす
        ];

        return in_array($theMemberRole, $editableRoleList);
    }

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

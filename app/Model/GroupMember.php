<?php

namespace App\Model;

use App\Model\Member;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class GroupMember extends Model implements AuthenticatableContract, AuthorizableContract {

    use Authenticatable,
        Authorizable;

    protected $table = 'group_member';
    /**
     * 
     * @param \App\Model\type 
     * @param \App\Model\type $uid
     * @return \App\Model\type用户对应的角色$uid
     * @return \App\Model\type用户对应的角色
     * @param type $uid
     * @return type用户对应的角色
     */
    public static function selectAll($uid) {
        return self::where('user_id', $uid)->pluck('group_id');
        //dd($data->group_id);
    }

}

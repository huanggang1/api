<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class GroupRules extends Model implements AuthenticatableContract, AuthorizableContract {

    use Authenticatable,
        Authorizable;

    protected $table = 'group_rules';

    /**
     * 角色的权限
     * @param type $uid
     * @return type
     */
    public static function selectAll($uid) {
         return self::whereIn('group_id', $uid)->pluck('rule_id');
    }

}

<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Roles extends Model implements AuthenticatableContract, AuthorizableContract {

    use Authenticatable,
        Authorizable;

    protected $table = 'rules';

    /**
     * 权限列表
     * @param type $Rid
     * @return type
     */
    public static function selectAll($Rid) {
         return self::whereIn('id', $Rid)->pluck('rule');
    }

}

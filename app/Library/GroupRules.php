<?php

use App\Model\GroupMember;
use App\Model\GroupRules as RulesGroup;
use App\Model\Roles;
use Illuminate\Http\Request;
class GroupRules {

    private static $_groupId;
    private static $_rolesId;
    /**
     * 获取用户的对应的角色
     * @param type $id
     * @return type
     */
    public static function groupList($id) {
        //获取对应的角色
        $groupId = GroupMember::selectAll($id);
        return self::$_groupId = $groupId;
    }
    /**
     * 获取角色对应的权限
     * @return type
     */
    public static function rulesList() {
       $rolesId= RulesGroup::selectAll(self::$_groupId);
        return self::$_rolesId = $rolesId;
    }
    /**
     * 获取角色对应的权限名称
     * @return type
     */
    public static function Roles(){
        return Roles::selectAll(self::$_rolesId);
    }
}

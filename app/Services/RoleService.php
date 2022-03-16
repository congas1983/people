<?php

namespace App\Services;
use App\Models\Role;
use Cache;

class RoleService
{
    /**
     * @return [type]
     */
    public static function list(){
        $roles = Cache::remember('roles',18000, function () {
            return Role::select('id','name')->get();
        });   
        return $roles;
    }
}

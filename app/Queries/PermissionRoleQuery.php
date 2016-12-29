<?php

namespace App\Query;

use App\Query\BasicQuery;
use DB;

class PermissionRoleQuery extends BasicQuery
{
    protected function roleAssignedPermission($id)
    {
        $query = DB::table('permission_role')
            ->select('permission_id')
            ->where('role_id','=',$id)
            ->orderBy('permission_id')
            ->pluck('permission_id');
        return $query;
    }
}
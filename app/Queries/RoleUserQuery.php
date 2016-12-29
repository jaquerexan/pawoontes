<?php

namespace App\Query;

//use Yajra\Datatables\Datatables;
use DB;
use App\Query\BasicQuery;
//use App\Role;

class RoleUserQuery extends BasicQuery
{
    protected function userAssignedRole($id)
    {
        $query = DB::table('role_user')
            ->select('user_id')
            ->where('role_id','=',$id)
            ->orderBy('user_id')
            ->pluck('user_id');
        return $query;
    }  
}
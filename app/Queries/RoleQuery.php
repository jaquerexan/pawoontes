<?php

namespace App\Query;

use Yajra\Datatables\Datatables;
use App\Query\BasicQuery;
use App\Role;

class roleQuery extends BasicQuery
{
    /**
     * [newEntity description]
     * @return [type] [description]
     */
    protected function newEntity()
    {
        return (new Role());
    }

    /**
     * [setField description]
     * @param [type] $request [description]
     */
    protected function setField($request)
    {
        $datarequest = [
        	'status' => $request->status,
        	'name' => $request->name,
        	'display_name' => $request->display_name,
            'description' => $request->description,
        ];

        return $datarequest;
    }

    /**
     * [indexRecordQuery description]
     * @param  [type] $condition [description]
     * @return [type]            [description]
     */
    protected function indexRecordQuery($condition = null)
    {
        $query = $this->newEntity();
        $query = $query->select('id','name','display_name','description');
        foreach ($condition as $key => $value) {
            $query = $query->where($key,'=',$value);
        }

        return $query;
    }

    /**
     * [permissionRoleDataQuery description]
     * @param  [type] $condition [description]
     * @return [type]            [description]
     */
    protected function permissionRoleDataQuery($condition = null)
    {
        $query = $this->newEntity();
        $query = $query->select('permissions.id','permissions.name','permissions.display_name')
            ->leftJoin('permission_role','permission_role.role_id','=','roles.id')
            ->leftJoin('permissions','permissions.id','=','permission_role.permission_id');
        foreach ($condition as $key => $value) {
            $query = $query->where($key,'=',$value);
        }

        return $query;
    }

    /**
     * [roleUserDataQuery description]
     * @param  [type] $condition [description]
     * @return [type]            [description]
     */
    protected function roleUserDataQuery($condition = null)
    {
        $query = $this->newEntity();
        $query = $query->select('users.id','users.name','users.email')
            ->leftJoin('role_user','role_user.role_id','=','roles.id')
            ->leftJoin('users','users.id','=','role_user.user_id');
        foreach ($condition as $key => $value) {
            $query = $query->where($key,'=',$value);
        }

        return $query;
    }

    /**
     * [indexDatatable description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    protected function indexDatatable($query)
    {
        $datatable = Datatables::of($query);
        $datatable = $datatable->addColumn('action', function ($query) {
            return view('role.option', ['query' => $query]);
        });

        return $datatable->make(true);
    }
}
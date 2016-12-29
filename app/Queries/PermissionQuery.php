<?php

namespace App\Query;

use Yajra\Datatables\Datatables;
use App\Query\BasicQuery;
use App\Permission;

class PermissionQuery extends BasicQuery
{
    protected function newEntity()
    {
        return (new Permission());
    }

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

    protected function indexRecordQuery($condition = null)
    {
        $query = $this->newEntity();
        $query = $query->select('id','name','display_name','description');
        foreach ($condition as $key => $value) {
            $query = $query->where($key,'=',$value);
        }

        return $query;
    }

    protected function indexDatatable($query)
    {
        $datatable = Datatables::of($query);
        $datatable = $datatable->addColumn('action', function ($query) {
            return view('Permission.option', ['query' => $query]);
        });
        return $datatable->make(true);
    }

    protected function permissionList($condition = null)
    {
        $query = $this->newEntity();
        $query = $query->select('id','name')->orderBy('name')->pluck('name', 'id');
        return $query;
    }
}
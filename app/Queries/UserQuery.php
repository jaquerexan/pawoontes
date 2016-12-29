<?php

namespace App\Query;

use Yajra\Datatables\Datatables;
use App\Query\BasicQuery;
use App\User;

class UserQuery extends BasicQuery
{
    /**
     * [newEntity description]
     * @return [type] [description]
     */
    protected function newEntity()
    {
        return (new User());
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
        	'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        return $datarequest;
    }

    /**
     * [setFieldUpdate description]
     * @param [type] $request [description]
     */
    protected function setFieldUpdate($request)
    {
        $datarequest = [
            'status' => $request->status,
            'name' => $request->name,
            'email' => $request->email,
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
        $query = $query->select('id','name','email');
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
            return view('user.option', ['query' => $query]);
        });
        return $datatable->make(true);
    }

    /**
     * [userList description]
     * @return [type] [description]
     */
    protected function userList()
    {
        $query = $this->newEntity();
        $query = $query->select('id','name')->orderBy('name')->pluck('name', 'id');
        return $query;
    }
}
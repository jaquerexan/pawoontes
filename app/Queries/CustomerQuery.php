<?php

namespace App\Queries;

use Yajra\Datatables\Datatables;
use App\Queries\BasicQuery;
use App\Customer;

class CustomerQuery extends BasicQuery
{
    /**
     * [newEntity description]
     * @return [type] [description]
     */
    protected function newEntity()
    {
        return (new Customer());
    }

    /**
     * [setField description]
     * @param [type] $request [description]
     */
    protected function setField($request)
    {
        $datarequest = [
            'status' => $request->status,
        	'uuid' => $request->uuid,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
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
        $query = $query->select('cust_id','uuid','nama','alamat');
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
            return view('customer.option', ['query' => $query]);
        });

        return $datatable->make(true);
    }

    /**
     * [countryList description]
     * @param  [type] $condition [description]
     * @return [type]            [description]
     */
    protected function CustomerList($condition)
    {
        $query = $this->newEntity();
        $query = $query->select('uuid','nama');
        foreach ($condition as $key => $value) {
            $query = $query->where($key,'=',$value);
        }
        $query = $query->orderBy('nama')->pluck('nama','uuid');

        return $query;
    }
}
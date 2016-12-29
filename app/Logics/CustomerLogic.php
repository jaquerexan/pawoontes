<?php

namespace App\Logics;

use Auth;
use App\Queries\CustomerQuery;

class CustomerLogic extends CustomerQuery
{
	/**
	 * store specific data in storage
	 * 
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public function store($request, $datetime)
	{
    	$request->merge(['status' => 'active']);
        $datarequest = $this->setField($request);
        return $this->storeData($request, $datetime, $datarequest);
	}

	/**
	 * update specific data in storeage
	 * 
	 * @param  [type]
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public function update($id, $request, $datetime)
	{
    	$request->merge(['status' => 'active']);
		$datarequest = $this->setField($request);
		return $this->updateData($id, $request, $datetime, $datarequest);
	}

	/**
	 * soft delete specific data in storage
	 * 
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public function delete($id, $datetime)
	{
		$datarequest = ['status' => 'inactive'];
		return $this->deleteData($id, $datetime, $datarequest);
	}

	/**
	 * hard delete specific data in storage
	 * @param  [type]
	 * @return [type]
	 */
	public function destroy($id)
	{
		return $this->destroyData($id);
	}

	/**
	 * [getIndexData description]
	 * @param  [type] $condition [description]
	 * @return [type]            [description]
	 */
	public function getIndexData($condition = null)
	{
        $query = $this->indexRecordQuery($condition);
        $query = $this->indexDatatable($query);
        return $query;
	}

	/**
	 * [getCustomerList description]
	 * @param  [type] $condition [description]
	 * @return [type]            [description]
	 */
	public function getCustomerList($condition = null)
	{
		return $this->customerList($condition);
	}
}

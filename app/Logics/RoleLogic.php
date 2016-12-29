<?php

namespace App\Logics;

use Auth;
use App\Queries\RoleQuery;

class RoleLogic extends RoleQuery
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
        $store = $this->storeData($request, $datetime, $datarequest);

		if($store)
		{
			$this->setPermissionRole($id, $request);
		}

		return $store;
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
		$update = $this->updateData($id, $request, $datetime, $datarequest);
		if($update)
		{
			$this->setPermissionRole($id, $request);
		}

		return $update;
	}

	/**
	 * [setPermissionRole description]
	 * @param  [type] $id      [description]
	 * @param  [type] $request [description]
	 * @return [type]          [description]
	 */
	public function setPermissionRole($id, $request)
	{
		$role = $this->getRecordById($id);
        $permissions = is_array($request->get('permissions')) ? $request->get('permissions') : [];
        $role->permissions()->sync($permissions);
	}

	/**
	 * [updateRoleUser description]
	 * @param  [type] $id      [description]
	 * @param  [type] $request [description]
	 * @return [type]          [description]
	 */
	private function updateRoleUser	($id, $request)
	{
		$role = $this->getRecordById($id);
        $users = is_array($request->get('users')) ? $request->get('users') : [];
        $role->users()->sync($users);
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
	 * [getPermissionRoleData description]
	 * @param  [type] $condition [description]
	 * @return [type]            [description]
	 */
	public function getPermissionRoleData($condition = null)
	{
        $query = $this->permissionRoleDataQuery($condition);
        $query = $this->indexDatatable($query);
        return $query;
	}

	/**
	 * [getRoleUserData description]
	 * @param  [type] $condition [description]
	 * @return [type]            [description]
	 */
	public function getRoleUserData($condition = null)
	{
        $query = $this->roleUserDataQuery($condition);
        $query = $this->indexDatatable($query);
        return $query;
	}
}

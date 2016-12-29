<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\PermissionLogic;
use App\Logic\PermissionRoleLogic;
use App\Logic\RoleLogic;
use App\Logic\RoleUserLogic;
use App\Logic\UserLogic;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $availPermissions = (new PermissionLogic())->getPermissionList();
        $availusers = (new UserLogic())->getUserList();

        return view('role.create',['availPermissions' => $availPermissions, 'availusers' => $availusers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datetime=date('Y-m-d H:i:s');
        $role = (new RoleLogic())->store($request, $datetime);

        return redirect('role')->with('message', config('generalMessage.messages.submitSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = (new RoleLogic())->getRecordById($id);
        return view('role.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = (new RoleLogic())->getRecordById($id);
        $availPermissions = (new PermissionLogic())->getPermissionList();
        $assignedPermissions = (new PermissionRoleLogic())->getRoleAssignedPermission($id)->toArray();
        $availusers = (new UserLogic())->getUserList();
        $assignedusers = (new RoleUserLogic())->getUserAssignedRole($id)->toArray();

        return view('role.edit', ['role' => $role, 'availPermissions' => $availPermissions, 'assignedPermissions' => $assignedPermissions, 'availusers' => $availusers, 'assignedusers' => $assignedusers
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datetime=date('Y-m-d H:i:s');
        $role = (new RoleLogic())->update($id, $request, $datetime);

        return redirect('role')->with('message', config('generalMessage.messages.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datetime=date('Y-m-d H:i:s');
        $role = (new RoleLogic())->delete($id);

        return redirect('role')->with('message', config('generalMessage.messages.deleteSuccess'));
    }

    /**
     * [anyData description]
     * @return [type] [description]
     */
    public function indexData()
    {
        return (new RoleLogic())->getIndexData(['status' => 'active']);
    }

    /**
     * [permissionRoleData description]
     * @return [type] [description]
     */
    public function permissionRoleData()
    {
        return (new RoleLogic())->getPermissionRoleData(['roles.status' => 'active']);
    }

    /**
     * [roleUserData description]
     * @return [type] [description]
     */
    public function roleUserData()
    {
        return (new RoleLogic())->getRoleUserData(['roles.status' => 'active']);
    }
}

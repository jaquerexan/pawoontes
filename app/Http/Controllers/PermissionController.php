<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\PermissionLogic;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = (new PermissionLogic())->getIndex(['permission_status' => 'active']);
        return view('permission.index', ['permission' => $permission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
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
        $permission = (new PermissionLogic())->store($request, $datetime);

        return redirect('permission')->with('message', config('generalMessage.messages.submitSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = (new PermissionLogic())->getRecordById($id);
        return view('permission.show', ['permission' => $permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = (new PermissionLogic())->getRecordById($id);
        return view('permission.edit', ['permission' => $permission]);
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
        $permission = (new PermissionLogic())->update($id, $request, $datetime);

        return redirect('permission')->with('message', config('generalMessage.messages.updateSuccess'));
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
        $permission = (new PermissionLogic())->delete($id);

        return redirect('permission')->with('message', config('generalMessage.messages.deleteSuccess'));
    }

    /**
     * [anyData description]
     * @return [type] [description]
     */
    public function indexData()
    {
        return (new PermissionLogic())->getIndexData(['status' => 'active']);
    }
}

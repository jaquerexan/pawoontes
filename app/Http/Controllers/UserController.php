<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Logic\UserLogic;
use App\Logic\CompanyLogic;
use App\Logic\CompanyUserLogic;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = (new UserLogic())->getIndex(['user_status' => 'active']);
        return view('user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companylist = (new CompanyLogic())->getCompanyList(['status' => 'active']);
        return view('user.create',['companylist' => $companylist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $datetime=date('Y-m-d H:i:s');
        $user = (new UserLogic())->store($request, $datetime);
        $request->merge(['cmp_id' => $request->cmp_id, 'user_id' => $user->id]);
        $companyuser = (new CompanyUserLogic())->store($request, $datetime);

        return redirect('user')->with('message', config('generalMessage.messages.submitSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = (new UserLogic())->getRecordById($id);
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = (new UserLogic())->getRecordById($id);
        $companylist = (new CompanyLogic())->getCompanyList(['status' => 'active']);
        $companyuser = (new CompanyUserLogic())->getRecord(['status' => 'active', 'user_id' => $id]);
        return view('user.edit', ['user' => $user, 'companylist' => $companylist, 'companyuser' => $companyuser]);
    }

    public function editPass($id)
    {
        $user = (new UserLogic())->getRecordById($id);
        $companylist = (new CompanyLogic())->getCompanyList(['status' => 'active']);
        $companyuser = (new CompanyUserLogic())->getRecord(['status' => 'active', 'user_id' => $id]);
        return view('user.editpass', ['user' => $user, 'companylist' => $companylist, 'companyuser' => $companyuser, 'editpass' => 'true']);        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStoreRequest $request, $id)
    {
        $datetime=date('Y-m-d H:i:s');
        $request->offsetUnset('password');
        $request->offsetUnset('password_confirmation');
        
        $user = (new UserLogic())->update($id, $request, $datetime);

        return redirect('user')->with('message', config('generalMessage.messages.updateSuccess'));
    }

    public function change(UserStoreRequest $request, $id)
    {        
        $datetime=date('Y-m-d H:i:s');
        $user = (new UserLogic())->updatePassword($id, $request, $datetime);

        return redirect('user')->with('message', config('generalMessage.messages.updateSuccess'));
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
        $user = (new UserLogic())->delete($id, $datetime);
        $companyuser = (new CompanyUserLogic())->getRecord(['status' => 'active', 'user_id' => $id]);
        $companyuser = (new CompanyUserLogic())->delete($companyuser->cous_id, $datetime);

        return redirect('user')->with('message', config('generalMessage.messages.deleteSuccess'));
    }

    /**
     * [anyData description]
     * @return [type] [description]
     */
    public function indexData()
    {
        return (new UserLogic())->getIndexData(['status' => 'active']);
    }
}

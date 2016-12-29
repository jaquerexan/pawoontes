<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logics\CustomerLogic;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$hashuuid = bcrypt(date('Y-m-d H:i:s'));
        return view('customer.create',['hashuuid' => $hashuuid]);
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
        (new CustomerLogic())->store($request, $datetime);
        return redirect('customer')->with('message', config('generalmessages.messages.submitSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = (new CustomerLogic())->getRecordById($id);
        return view('customer.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = (new CustomerLogic())->getRecordById($id);
        return view('customer.edit', ['customer' => $customer, 'hashuuid' => $customer->uuid]);
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
        $customer = (new CustomerLogic())->update($id, $request, $datetime);
        return redirect('customer')->with('message', config('generalmessages.messages.updateSuccess'));
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
        $customer = (new CustomerLogic())->delete($id, $datetime);
        return redirect('customer')->with('message', config('generalmessages.messages.deleteSuccess'));
    }

    /**
     * [indexData description]
     * @return [type] [description]
     */
    public function indexData()
    {
        return (new CustomerLogic())->getIndexData(['status' => 'active']);
    }
}

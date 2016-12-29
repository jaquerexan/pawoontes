<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::auth();
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function() {
  /**
   * user router
   */
  Route::GET('user/indexdata',
  [
    'uses' => 'UserController@indexData',
    'middleware' => ['permission:user_indexdata'],
  ]);
  Route::GET('user',
	[
	  'as' => 'user.index',
	  'uses' => 'UserController@index',
	  'middleware' => ['permission:user_index'],
	]);
  Route::GET('user/create',
  [
    'as' => 'user.create',
    'uses' => 'UserController@create',
    'middleware' => ['permission:user_create'],
  ]);
  Route::POST('user',
  [
    'as' => 'user.store',
    'uses' => 'UserController@store',
    'middleware' => ['permission:user_store'],
  ]);
  Route::GET('user/{user}',
  [
    'as' => 'user.show',
    'uses' => 'UserController@show',
    'middleware' => ['permission:user_show'],
  ]);
  Route::GET('user/{user}/edit',
  [
    'as' => 'user.edit',
    'uses' => 'UserController@edit',
    'middleware' => ['permission:user_edit'],
  ]);
  Route::GET('user/{user}/editpass',
  [
    'as' => 'user.editpass',
    'uses' => 'UserController@editPass',
    'middleware' => ['permission:user_editpass'],
  ]);
  Route::PUT('user/{user}',
  [
    'as' => 'user.update',
    'uses' => 'UserController@update',
    'middleware' => ['permission:user_update'],
  ]);
  Route::PUT('user/{user}/change',
  [
    'as' => 'user.change',
    'uses' => 'UserController@change',
    'middleware' => ['permission:user_change'],
  ]);
  Route::DELETE('user/{user}',
  [
    'as' => 'user.destroy',
    'uses' => 'UserController@destroy',
    'middleware' => ['permission:user_destroy'],
  ]);

  /**
   * role router
   */
  Route::ANY('role/indexdata',
  [
    'uses' => 'roleController@indexData',
    'middleware' => ['permission:role_indexdata'],
  ]);
  Route::ANY('role/permissionRoleData',
  [
    'uses' => 'roleController@indexData',
    'middleware' => ['permission:role_indexdata'],
  ]);
  Route::ANY('role/roleUserData',
  [
    'uses' => 'roleController@indexData',
    'middleware' => ['permission:role_indexdata'],
  ]);
  Route::GET('role',
  [
    'as' => 'role.index',
    'uses' => 'roleController@index',
    'middleware' => ['permission:role_index'],
  ]);
  Route::GET('role/create',
  [
    'as' => 'role.create',
    'uses' => 'roleController@create',
    'middleware' => ['permission:role_create'],
  ]);
  Route::POST('role',
  [
    'as' => 'role.store',
    'uses' => 'roleController@store',
    'middleware' => ['permission:role_store'],
  ]);
  Route::GET('role/{role}',
  [
    'as' => 'role.show',
    'uses' => 'roleController@show',
    'middleware' => ['permission:role_show'],
  ]);
  Route::GET('role/{role}/edit',
  [
    'as' => 'role.edit',
    'uses' => 'roleController@edit',
    'middleware' => ['permission:role_edit'],
  ]);
  Route::PUT('role/{role}',
  [
    'as' => 'role.update',
    'uses' => 'roleController@update',
    'middleware' => ['permission:role_update'],
  ]);
  Route::DELETE('role/{role}',
  [
    'as' => 'role.destroy',
    'uses' => 'roleController@destroy',
    'middleware' => ['permission:role_destroy'],
  ]);

  /**
   * permission router
   */
  Route::ANY('permission/indexdata',
  [
    'uses' => 'permissionController@indexData',
    'middleware' => ['permission:permission_indexdata'],
  ]);
  Route::GET('permission',
  [
    'as' => 'permission.index',
    'uses' => 'permissionController@index',
    'middleware' => ['permission:permission_index'],
  ]);
  Route::GET('permission/create',
  [
    'as' => 'permission.create',
    'uses' => 'permissionController@create',
    'middleware' => ['permission:permission_create'],
  ]);
  Route::POST('permission',
  [
    'as' => 'permission.store',
    'uses' => 'permissionController@store',
    'middleware' => ['permission:permission_store'],
  ]);
  Route::GET('permission/{permission}',
  [
    'as' => 'permission.show',
    'uses' => 'permissionController@show',
    'middleware' => ['permission:permission_show'],
  ]);
  Route::GET('permission/{permission}/edit',
  [
    'as' => 'permission.edit',
    'uses' => 'permissionController@edit',
    'middleware' => ['permission:permission_edit'],
  ]);
  Route::PUT('permission/{permission}',
  [
    'as' => 'permission.update',
    'uses' => 'permissionController@update',
    'middleware' => ['permission:permission_update'],
  ]);
  Route::DELETE('permission/{permission}',
  [
    'as' => 'permission.destroy',
    'uses' => 'permissionController@destroy',
    'middleware' => ['permission:permission_destroy'],
  ]);

  /**
   * customer route
   */
  Route::ANY('customer/indexdata',
  [
    'uses' => 'customerController@indexData',
    'middleware' => ['permission:customer_indexdata'],
  ]);
  Route::GET('customer',
  [
    'as' => 'customer.index',
    'uses' => 'customerController@index',
    'middleware' => ['permission:customer_index'],
  ]);
  Route::GET('customer/create',
  [
    'as' => 'customer.create',
    'uses' => 'customerController@create',
    'middleware' => ['permission:customer_create'],
  ]);
  Route::POST('customer',
  [
    'as' => 'customer.store',
    'uses' => 'customerController@store',
    'middleware' => ['permission:customer_store'],
  ]);
  Route::GET('customer/{id}',
  [
    'as' => 'customer.show',
    'uses' => 'customerController@show',
    'middleware' => ['permission:customer_show'],
  ]);
  Route::GET('customer/{id}/edit',
  [
    'as' => 'customer.edit',
    'uses' => 'customerController@edit',
    'middleware' => ['permission:customer_edit'],
  ]);
  Route::PUT('customer/{id}',
  [
    'as' => 'customer.update',
    'uses' => 'customerController@update',
    'middleware' => ['permission:customer_update'],
  ]);
  Route::DELETE('customer/{id}',
  [
    'as' => 'customer.destroy',
    'uses' => 'customerController@destroy',
    'middleware' => ['permission:customer_destroy'],
  ]);
});
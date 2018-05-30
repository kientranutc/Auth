<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//-------------------------------Frontend--------------------------------------
Route::get('/', function () {
    return view('backend.layouts.master');
});
Route::get('/login', function () {
    return view('backend.login');
});

//--------------------------------Backend---------------------------------------
Route::prefix('admin')->group(function () {
    Route::prefix('role')->group(function () {
        Route::get('',[
            'as' => 'role.index',
            'uses' => 'Backend\RoleController@index'
        ]);
        Route::get('add',[
            'as' => 'role.add',
            'uses' => 'Backend\RoleController@add'
        ]);
        Route::post('add',[
            'as' => 'role.add-post',
            'uses' => 'Backend\RoleController@processAdd'
        ]);
        Route::get('update/{id}',[
            'as' => 'role.update',
            'uses' => 'Backend\RoleController@update'
        ]);
        Route::post('update/{id}',[
            'as' => 'role.update-post',
            'uses' => 'Backend\RoleController@processUpdate'
        ]);
        Route::get('delete/{id}',[
            'as' => 'role.delete',
            'uses' => 'Backend\RoleController@delete'
        ]);
    });
});
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
$this->group(['middleware'=> ['auth'], 'namespace' => 'Admin' ], function (){
    Route::get('admin', 'AdminController@index')->name('admin.home');
    Route::resource('patrimonies', 'PatrimonyController2')->middleware('auth');
    
});
Route::get('/', function(){ return view('auth.login'); });
Route::post('/patrimonies/add', ['uses'=>'Admin\PatrimonyController2@add', 'as' => 'patrimonies.add']);

Auth::routes();

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
    Route::resource('patrimonies', 'PatrimonyController')->middleware('auth');
    Route::resource('rooms', 'RoomController')->middleware('auth');
    Route::resource('buildings', 'BuildingController')->middleware('auth');
    
});

/**
 * 
 * Patrimony Routes
 * 
 * @author: Márcio Isaque
 * 
 */
//Index page
Route::get('/', function(){ return view('auth.login'); });
//Add Patrimony
Route::post('/patrimonies/add', ['uses'=>'Admin\PatrimonyController@add', 'as' => 'patrimonies.add']);
//Edition Patrimony Routes
Route::get('/patrimonies/edition/{id}', ['uses'=>'Admin\PatrimonyController@edition', 'as' => 'patrimonies.edition']);
Route::put('/patrimonies/edit/{id}', ['uses'=>'Admin\PatrimonyController@edit', 'as' => 'patrimonies.edit']);
//Delete Patrimony Route
Route::get('/patrimonies/delete/{id}', ['uses'=>'Admin\PatrimonyController@delete', 'as' => 'patrimonies.delete']);

/**
 * 
 * Buildings Routes
 * 
 * @author: Márcio Isaque
 * 
 */
//Add Building
Route::post('/buildings/add', ['uses'=>'Admin\BuildingController@add', 'as' => 'buildings.add']);
//Edition Building Routes
Route::get('/buildings/edition/{id}', ['uses'=>'Admin\BuildingController@edition', 'as' => 'buildings.edition']);
Route::put('/buildings/edit/{id}', ['uses'=>'Admin\BuildingController@edit', 'as' => 'buildings.edit']);
//Delete Building Route
Route::get('/buildings/delete/{id}', ['uses'=>'Admin\BuildingController@delete', 'as' => 'buildings.delete']);

//
Auth::routes();

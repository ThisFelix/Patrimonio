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
    Route::resource('sectors', 'SectorController')->middleware('auth');
    
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
Route::post('/patrimonies/allocate', ['uses'=>'Admin\PatrimonyController@allocate', 'as' => 'patrimonies.allocate']);
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


/**
 * 
 * Rooms Routes
 * 
 * @author: Márcio Isaque
 * 
 */
//Add Room
Route::post('/rooms/add', ['uses'=>'Admin\RoomController@add', 'as' => 'rooms.add']);
//Edition Room Routes
Route::get('/rooms/edition/{id}', ['uses'=>'Admin\RoomController@edition', 'as' => 'rooms.edition']);
Route::put('/rooms/edit/{id}', ['uses'=>'Admin\RoomController@edit', 'as' => 'rooms.edit']);
//Delete Room Route
Route::get('/rooms/delete/{id}', ['uses'=>'Admin\RoomController@delete', 'as' => 'rooms.delete']);
//
Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





//Add Sector
Route::post('/sectors/add', ['uses'=>'Admin\SectorController@add', 'as' => 'sectors.add']);
Route::post('/sectors/create', ['uses'=>'Admin\SectorController@create', 'as' => 'sectors.create']);

Route::get('/sectors/edition/{id}', ['uses'=>'Admin\SectorController@edition', 'as' => 'sectors.edition']);
Route::put('/sectors/edit/{id}', ['uses'=>'Admin\SectorController@edit', 'as' => 'sectors.edit']);

Route::get('/sectors/delete/{id}', ['uses'=>'Admin\SectorController@delete', 'as' => 'sectors.delete']);

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
    Route::resource('reports', 'ReportController')->middleware('auth');

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
    Route::post('/patrimonies/add', ['uses'=>'PatrimonyController@add', 'as' => 'patrimonies.add']);
    //Edition Patrimony Routes
    Route::get('/patrimonies/edition/{id}', ['uses'=>'PatrimonyController@edition', 'as' => 'patrimonies.edition']);
    Route::put('/patrimonies/edit/{id}', ['uses'=>'PatrimonyController@edit', 'as' => 'patrimonies.edit']);
    Route::post('/patrimonies/allocate', ['uses'=>'PatrimonyController@allocate', 'as' => 'patrimonies.allocate']);
    //Delete Patrimony Route
    Route::get('/patrimonies/delete/{id}', ['uses'=>'PatrimonyController@delete', 'as' => 'patrimonies.delete']);

    /**
     * 
     * Buildings Routes
     * 
     * @author: Márcio Isaque
     * 
     */
    //Add Building
    Route::post('/buildings/add', ['uses'=>'BuildingController@add', 'as' => 'buildings.add']);
    //Edition Building Routes
    Route::get('/buildings/edition/{id}', ['uses'=>'BuildingController@edition', 'as' => 'buildings.edition']);
    Route::put('/buildings/edit/{id}', ['uses'=>'BuildingController@edit', 'as' => 'buildings.edit']);
    //Delete Building Route
    Route::get('/buildings/delete/{id}', ['uses'=>'BuildingController@delete', 'as' => 'buildings.delete']);


    /**
     * 
     * Rooms Routes
     * 
     * @author: Márcio Isaque
     * 
     */
    //Add Room
    Route::post('/rooms/add', ['uses'=>'RoomController@add', 'as' => 'rooms.add']);
    //Edition Room Routes
    Route::get('/rooms/edition/{id}', ['uses'=>'RoomController@edition', 'as' => 'rooms.edition']);
    Route::put('/rooms/edit/{id}', ['uses'=>'RoomController@edit', 'as' => 'rooms.edit']);
    //Delete Room Route
    Route::get('/rooms/delete/{id}', ['uses'=>'RoomController@delete', 'as' => 'rooms.delete']);
    //
    Auth::routes();

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');





    //Add Sector
    Route::post('/sectors/add', ['uses'=>'SectorController@add', 'as' => 'sectors.add']);
    Route::post('/sectors/create', ['uses'=>'SectorController@create', 'as' => 'sectors.create']);

    Route::get('/sectors/edition/{id}', ['uses'=>'SectorController@edition', 'as' => 'sectors.edition']);
    Route::put('/sectors/edit/{id}', ['uses'=>'SectorController@edit', 'as' => 'sectors.edit']);

    Route::get('/sectors/delete/{id}', ['uses'=>'SectorController@delete', 'as' => 'sectors.delete']);



    /**
     * 
     * Reports Routes
     * 
     * @author: Márcio Isaque
     * 
     */
    //Sector Report
    Route::get('/reports/sector/{id}', ['uses'=>'ReportController@sectorReport', 'as' => 'reports.sector']);
    //Room Report
    Route::get('/reports/room/{id}', ['uses'=>'ReportController@roomReport', 'as' => 'reports.room']);
    
});


$this->group(['middleware'=> ['auth'], 'namespace' => 'Client' ], function (){
    Route::get('client', 'ClientController@index')->name('client.home');

    /**
     * 
     * Request Routes
     * 
     * @author: Márcio Isaque
     * 
     */
    //Form Request
    Route::get('/patrimoniesForLoan/request/{model}', ['uses'=>'PatrimonyController@request_form', 'as' => 'patrimoniesForLoan.request']);
    Route::get('patrimoniesForLoan', ['uses'=>'PatrimonyController@index', 'as' => 'patrimoniesForLoan']);
});




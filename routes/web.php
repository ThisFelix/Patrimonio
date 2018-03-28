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
    
});
//Index page
Route::get('/', function(){ return view('auth.login'); });
//Add Patrimony
Route::post('/patrimonies/add', ['uses'=>'Admin\PatrimonyController@add', 'as' => 'patrimonies.add']);
//Edition Patrimony Routes
Route::get('/patrimonies/edition/{id}', ['uses'=>'Admin\PatrimonyController@edition', 'as' => 'patrimonies.edition']);
Route::put('/patrimonies/edit/{id}', ['uses'=>'Admin\PatrimonyController@edit', 'as' => 'patrimonies.edit']);
//Delete Patrimony Route
Route::get('/patrimonies/delete/{id}', ['uses'=>'Admin\PatrimonyController@delete', 'as' => 'patrimonies.delete']);
Auth::routes();

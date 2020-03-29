<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/', function () {
    return view('admin.index');
});

Route::get('/admin/equipment/add', [
    'uses' => 'EquipmentController@create',
    'as' => 'equipment.create'
]);

Route::post('/admin/equipment/save', [
    'uses' => 'EquipmentController@save',
    'as' => 'equipment.save'
]);

Route::get('/admin/equipment/list', [
    'uses' => 'EquipmentController@list',
    'as' => 'equipment.list'
]);

Route::get('/admin/equipment/data', [
    'uses' => 'EquipmentController@data',
    'as' => 'equipment.data'
]);

Route::get('/admin/workplace/add', [
    'uses' => 'WorkplaceController@create',
    'as' => 'workplace.create'
]);

Route::post('/admin/workplace/save', [
    'uses' => 'WorkplaceController@save',
    'as' => 'workplace.save'
]);

Route::get('/admin/workplace/list', [
    'uses' => 'WorkplaceController@list',
    'as' => 'workplace.list'
]);

Route::get('/admin/workplace/data', [
    'uses' => 'WorkplaceController@data',
    'as' => 'workplace.data'
]);

Route::get('/admin/reservation/add', [
    'uses' => 'ReservationController@create',
    'as' => 'reservation.create'
]);

Route::post('/admin/reservation/save', [
    'uses' => 'ReservationController@save',
    'as' => 'reservation.save'
]);

Route::get('/admin/reservation/list', [
    'uses' => 'ReservationController@list',
    'as' => 'reservation.list'
]);

Route::get('/admin/reservation/data', [
    'uses' => 'ReservationController@data',
    'as' => 'reservation.data'
]);

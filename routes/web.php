<?php

use Illuminate\Support\Facades\Route;
use App\Models\Container;

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
    $containers= Container::all();
    return view('welcome', compact('containers'));
});
Route::resource('/container', '\App\Http\Controllers\ContainerController');
Route::post('/container/export','\App\Http\Controllers\ContainerController@export')->name('container.export');
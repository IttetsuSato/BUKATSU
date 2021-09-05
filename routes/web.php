<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CityController;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])
->name('top');


Route::get('/user.{city_id}.city', [UserController::class, 'indexByCity'])
->name('user.city');


// Route::get('/searchByArea', AreaController::class, 'searchByArea');
Route::resource('area', AreaController::class,['only' => ['index']]);
Route::resource('city', CityController::class,['only' => ['index']]);

//以下はログインしないと動作しない
Route::group(['middleware' => 'auth'], function(){

  Route::resource('user', UserController::class, ['only' => ['index','show', 'edit', 'update','destroy']]);
  Route::resource('club', ClubController::class);
  
});

require __DIR__.'/auth.php';

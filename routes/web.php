<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\UserController;


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

//以下はログインしないと動作しない
Route::group(['middleware' => 'auth'], function(){

  Route::resource('user', UserController::class, ['only' => ['index','show', 'edit', 'update','destroy']]);
  Route::resource('club', ClubController::class);
  
  Route::get('/dashboard', function () {
      return view('dashboard');
  })->name('dashboard');
  
});

require __DIR__.'/auth.php';

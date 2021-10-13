<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PdfController;


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

// Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])
->name('top');


Route::get('area.search', [AreaController::class, 'search'])->name('area.search');
Route::get('club.search', [ClubController::class, 'search'])->name('club.search');
Route::get('/user.city.{city_id}', [UserController::class, 'indexByCity'])->name('user.city');
Route::get('/user.club.{club_id}', [ClubController::class, 'indexUserByClub'])->name('user.club');

Route::get('privacyPolicy', [PdfController::class, 'privacyPolicy'])->name('privacyPolicy');



//以下はログインしないと動作しない
// Route::group(['middleware' => 'auth'], function(){
Route::middleware(['verified'])->group(function(){
  Route::get('myPage', function(){return view('user.myPage');})->name('myPage');
  Route::put('user.updateImage.{id}',  [UserController::class, 'updateImage'])->name('user.updateImage');

  Route::post('/confirm', [MailController::class, 'confirm'])->name('confirm');
  Route::post('/execute', [MailController::class, 'execute'])->name('execute');

  Route::get('registerClubs', [UserController::class, 'registerClubsCreate'])->name('registerClubs');
  Route::post('updateClubs.{user_id}', [UserController::class, 'registerClubsUpdate'])->name('updateClubs');
  
  Route::resource('user', UserController::class, ['only' => ['index','show', 'edit', 'update','destroy']]);
  Route::resource('area', AreaController::class,['only' => ['index']]);
  Route::resource('city', CityController::class,['only' => ['index']]);
  Route::resource('club', ClubController::class);
  
});

require __DIR__.'/auth.php';

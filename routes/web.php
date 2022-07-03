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
})->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'index']);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
  Route::get('/struk', [App\Http\Controllers\StrukController::class, 'index']);
  Route::post('/struk', [App\Http\Controllers\StrukController::class, 'print']);
  Route::get('/struk/create', [App\Http\Controllers\StrukController::class, 'create']);
  Route::post('/struk/store', [App\Http\Controllers\StrukController::class, 'store']);
  Route::get('/struk/{rekap}', [App\Http\Controllers\StrukController::class, 'show']);
  Route::resource('user', App\Http\Controllers\UserController::class);
});

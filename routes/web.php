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

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
  Route::get('/struk', [App\Http\Controllers\StrukController::class, 'index']);
  Route::get('/struk/{porefn}', [App\Http\Controllers\StrukController::class, 'show']);
});

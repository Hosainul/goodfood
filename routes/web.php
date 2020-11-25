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

Route::get('/', [App\Http\Controllers\homeController::class, 'index' ])->name('welcome');
Route::post('/reservation',[App\Http\Controllers\ReservationController::class, 'reserve'])->name('reservation.reserve');
Route::post('/contact',[App\Http\Controllers\ContactController::class, 'sendMessage'])->name('contact.send');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>'auth','namespace'=>'admin'], function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index' ])->name('admin.dashboard');
    Route::resource('slider', '\App\Http\Controllers\Admin\SliderController');
    Route::resource('category', '\App\Http\Controllers\Admin\CategoryController');
    Route::resource('item', '\App\Http\Controllers\Admin\ItemController');
    Route::get('reservation', [App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('reservation.index');
    Route::post('reservation/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'status'])->name('reservation.status');
    Route::delete('reservation/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'destroy'])->name('reservation.destroy');

    Route::get('contact', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contact.show');
    Route::delete('contact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contact.destroy');
});
<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Hospital\DoctorController;
use App\Http\Controllers\Hospital\GalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});


// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });

Route::controller(DoctorController::class)->group(function () {
    Route::get('hospital/doctor-index','index')->name('doctor.index');

    Route::get('doctor-create', 'create')->name('doctor.create');
    Route::post('doctor-store','store')->name('doctor.store');

    Route::get('doctor-edit-{id?}','edit')->name('doctor.edit');
    Route::post('doctor-update','update')->name('doctor.update');

    Route::get('doctor-destroy-{id?}','destroy')->name('doctor.destroy');
});

Route::controller(GalleryController::class)->group(function () {
    // Route::get('hospital/doctor-index','index')->name('doctor.index');

    Route::get('gallery-create', 'create')->name('gallery.create');
    // Route::post('doctor-store','store')->name('doctor.store');

    // Route::get('doctor-edit-{id?}','edit')->name('doctor.edit');
    // Route::post('doctor-update','update')->name('doctor.update');

    // Route::get('doctor-destroy-{id?}','destroy')->name('doctor.destroy');
});



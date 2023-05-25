<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HospitalController;

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

// Auth
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});


// Admin Side

Route::controller(CityController::class)->group(function(){
    Route::get('admin/city-create','create')->name('city.create');
    Route::post('admin/city-store','store')->name('city.store');
    Route::get('admin/city-index','index')->name('city.index');
    Route::get('admin/city-edit-{id?}','edit')->name('city.edit');
    Route::post('admin/city-update','update')->name('city.update');
    Route::get('admin/city-delete-{id?}', 'delete')->name('city.delete');
});

Route::controller(HospitalController::class)->group(function(){
    Route::get('admin/hospital-index','index')->name('hospital.index');
    Route::get('admin/hospital-create','create')->name('hospital.create');
    Route::post('admin/hospital-store','store')->name('hospital.store');
    Route::get('admin/hospital-edit-{id?}','edit')->name('hospital.edit');
    Route::post('admin/hospital-update','update')->name('hospital.update');
    Route::get('admin/hospital-delete-{id?}','delete')->name('hospital.delete');
});








// Hospital Side


// Doctor Side





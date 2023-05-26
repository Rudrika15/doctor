<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Hospital\DoctorController;
use App\Http\Controllers\Hospital\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\HospitalTypeController;
use App\Http\Controllers\Hospital\FacalityController;

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
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});


// ----------------------------------------Admin Side-------------------------------------------------

Route::controller(CityController::class)->group(function () {
    Route::get('admin/city-create', 'create')->name('city.create');
    Route::post('admin/city-store', 'store')->name('city.store');
    Route::get('admin/city-index', 'index')->name('city.index');
    Route::get('admin/city-edit-{id?}', 'edit')->name('city.edit');
    Route::post('admin/city-update', 'update')->name('city.update');
    Route::get('admin/city-delete-{id?}', 'delete')->name('city.delete');
});

Route::controller(HospitalController::class)->group(function () {
    Route::get('admin/hospital-index', 'index')->name('hospital.index');
    Route::get('admin/hospital-create', 'create')->name('hospital.create');
    Route::post('admin/hospital-store', 'store')->name('hospital.store');
    Route::get('admin/hospital-edit-{id?}', 'edit')->name('hospital.edit');
    Route::post('admin/hospital-update', 'update')->name('hospital.update');
    Route::get('admin/hospital-delete-{id?}', 'delete')->name('hospital.delete');
});

Route::controller(HospitalTypeController::class)->group(function () {
    Route::get('admin/hospitaltype-index', 'index')->name('hospitaltype.index');
    Route::get('admin/hospitaltype-create', 'create')->name('hospitaltype.create');
    Route::post('admin/hospitaltype-store', 'store')->name('hospitaltype.store');
    Route::get('admin/hospitaltype-edit-{id?}', 'edit')->name('hospitaltype.edit');
    Route::post('admin/hospitaltype-update', 'update')->name('hospitaltype.update');
    Route::get('admin/hospitaltype-delete-{id?}', 'delete')->name('hospitaltype.delete');
});

Route::controller(DoctorController::class)->group(function () {
    Route::get('admin-doctor-create', 'create');
});






//-------------------------------------- Hospital Side------------------------------------------

// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });

Route::controller(DoctorController::class)->group(function () {
   
    Route::get('hospital/doctor-index', 'index')->name('doctor.index');

    Route::get('hospital/doctor-create', 'create')->name('doctor.create');
    Route::post('doctor-store', 'store')->name('doctor.store');

    Route::get('doctor-edit-{id?}', 'edit')->name('doctor.edit');
    Route::get('doctor-update', 'update')->name('doctor.update');

    Route::get('doctor-destroy-{id?}', 'destroy')->name('doctor.destroy');
});


Route::controller(GalleryController::class)->group(function () {
     Route::get('hospital/gallery-index','index')->name('gallery.index');

    Route::get('hospital/gallery-create', 'create')->name('gallery.create');
     Route::post('gallery-store','store')->name('gallery.store');

     Route::get('hospital/gallery-edit-{id?}','edit')->name('gallery.edit');
     Route::post('hospital/gallery-update','update')->name('gallery.update');

     Route::get('gallery-destroy-{id?}','destroy')->name('gallery.destroy');
});

Route::controller(FacalityController::class)->group(function () {
    Route::get('hospital/facility-index','index')->name('facility.index');

   Route::get('hospital/facility-create', 'create')->name('facility.create');
    Route::post('facility-store','store')->name('facility.store');

    Route::get('hospital/facility-edit-{id?}','edit')->name('facility.edit');
    Route::post('hospital/facility-update','update')->name('facility.update');

    Route::get('facility-destroy-{id?}','destroy')->name('facility.destroy');
});


// --------------------------------------Doctor Side---------------------------------------------

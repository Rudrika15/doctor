<?php

use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminCityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminFacilityController;
use App\Http\Controllers\Hospital\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHospitalController;
use App\Http\Controllers\Admin\AdminHospitalTypeController;
use App\Http\Controllers\Doctor\BlogController;
use App\Http\Controllers\Hospital\DoctorController;
use App\Http\Controllers\Hospital\FacilityController;
use App\Http\Controllers\Hospital\ScheduleController;

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

// Admin City 
Route::controller(AdminCityController::class)->group(function () {
    Route::get('admin/city-create', 'create')->name('city.create');
    Route::post('admin/city-store', 'store')->name('city.store');
    Route::get('admin/city-index', 'index')->name('city.index');
    Route::get('admin/city-edit-{id?}', 'edit')->name('city.edit');
    Route::post('admin/city-update', 'update')->name('city.update');
    Route::get('admin/city-delete-{id?}', 'delete')->name('city.delete');
});

// Admin Hospital
Route::controller(AdminHospitalController::class)->group(function () {
    Route::get('admin/hospital-index', 'index')->name('hospital.index');
    Route::get('admin/hospital-create', 'create')->name('hospital.create');
    Route::post('admin/hospital-store', 'store')->name('hospital.store');
    Route::get('admin/hospital-edit-{id?}', 'edit')->name('hospital.edit');
    Route::post('admin/hospital-update', 'update')->name('hospital.update');
    Route::get('admin/hospital-delete-{id?}', 'delete')->name('hospital.delete');
    Route::get('admin/hospital-viewdetails-{id?}', 'viewDetails')->name('hospital.viewdetails');
});

// Admin HospitalType
Route::controller(AdminHospitalTypeController::class)->group(function () {
    Route::get('admin/hospitaltype-index', 'index')->name('hospitaltype.index');
    Route::get('admin/hospitaltype-create', 'create')->name('hospitaltype.create');
    Route::post('admin/hospitaltype-store', 'store')->name('hospitaltype.store');
    Route::get('admin/hospitaltype-edit-{id?}', 'edit')->name('hospitaltype.edit');
    Route::post('admin/hospitaltype-update', 'update')->name('hospitaltype.update');
    Route::get('admin/hospitaltype-delete-{id?}', 'delete')->name('hospitaltype.delete');
});

// Admin Doctor
Route::controller(AdminDoctorController::class)->group(function () {
    Route::get('admin/doctor-index-{id?}', 'index')->name('admin.doctor.index');
    Route::get('admin/doctor-create-{id?}', 'create')->name('admin.doctor.create');
    Route::post('admin/doctor-store', 'store')->name('admin.doctor.store');
    Route::get('admin/doctor-edit-{id?}', 'edit')->name('admin.doctor.edit');
    Route::post('admin/doctor-update', 'update')->name('admin.doctor.update');
    Route::get('admin/doctor-delete-{id?}', 'delete')->name('admin.doctor.delete');
});
// Admin Specialist
Route::controller(AdminSpecialistController::class)->group(function () {
    Route::get('admin/specialist-index', 'index')->name('specialist.index');
    Route::get('admin/specialist-create', 'create')->name('specialist.create');
    Route::post('admin/specialist-store', 'store')->name('specialist.store');
    Route::get('admin/specialist-edit-{id?}', 'edit')->name('specialist.edit');
    Route::post('admin/specialist-update', 'update')->name('specialist.update');
    Route::get('admin/specialist-delete-{id?}', 'delete')->name('specialist.delete');
});

// Admin Gallery
Route::controller(AdminGalleryController::class)->group(function () {
    Route::get('admin/gallery-index-{id?}', 'index')->name('admin.gallery.index');
    Route::get('admin/gallery-create-{id?}', 'create')->name('admin.gallery.create');
    Route::post('admin/gallery-store', 'store')->name('admin.gallery.store');
    Route::get('admin/gallery-edit-{id?}', 'edit')->name('admin.gallery.edit');
    Route::post('admin/gallery-update', 'update')->name('admin.gallery.update');
    Route::get('admin/gallery-delete-{id?}', 'delete')->name('admin.gallery.delete');
});
// Admin Facility
Route::controller(AdminFacilityController::class)->group(function () {
    Route::get('admin/facility-index-{id?}', 'index')->name('admin.facility.index');
    Route::get('admin/facility-create-{id?}', 'create')->name('admin.facility.create');
    Route::post('admin/facility-store', 'store')->name('admin.facility.store');
    Route::get('admin/facility-edit-{id?}', 'edit')->name('admin.facility.edit');
    Route::post('admin/facility-update', 'update')->name('admin.facility.update');
    Route::get('admin/facility-delete-{id?}', 'delete')->name('admin.facility.delete');
});





//-------------------------------------- Hospital Side------------------------------------------

Route::controller(DoctorController::class)->group(function () {

    Route::get('hospital/doctor-index', 'index')->name('doctor.index');
    Route::get('hospital/doctor-create', 'create')->name('doctor.create');
    Route::post('doctor-store', 'store')->name('doctor.store');
    Route::get('hospital/doctor-edit-{id?}', 'edit')->name('doctor.edit');
    Route::post('hospital/doctor-update', 'update')->name('doctor.update');
    Route::get('doctor-destroy-{id?}', 'destroy')->name('doctor.destroy');
});


Route::controller(GalleryController::class)->group(function () {
    Route::get('hospital/gallery-index', 'index')->name('gallery.index');
    Route::get('hospital/gallery-create', 'create')->name('gallery.create');
    Route::post('gallery-store', 'store')->name('gallery.store');
    Route::get('hospital/gallery-edit-{id?}', 'edit')->name('gallery.edit');
    Route::post('hospital/gallery-update', 'update')->name('gallery.update');
    Route::get('gallery-destroy-{id?}', 'destroy')->name('gallery.destroy');
});

Route::controller(FacilityController::class)->group(function () {
    Route::get('hospital/facility-index', 'index')->name('facility.index');
    Route::get('hospital/facility-create', 'create')->name('facility.create');
    Route::post('facility-store', 'store')->name('facility.store');
    Route::get('hospital/facility-edit-{id?}', 'edit')->name('facility.edit');
    Route::post('hospital/facility-update', 'update')->name('facility.update');
    Route::get('facility-destroy-{id?}', 'destroy')->name('facility.destroy');
});

Route::controller(ScheduleController::class)->group(function () {

    Route::get('hospital/schedule-index', 'index')->name('schedule.index');
    Route::get('hospital/schedule-create', 'create')->name('schedule.create');
    Route::post('schedule-store', 'store')->name('schedule.store');
    Route::get('hospital/schedule.edit-{id?}', 'edit')->name('schedule.edit');
    Route::post('hospital/schedule.update', 'update')->name('schedule.update');
    Route::get('schedule-destroy-{id?}', 'destroy')->name('schedule.destroy');
});


// --------------------------------------Doctor Side---------------------------------------------

Route::controller(BlogController::class)->group(function(){

    Route::get('doctor/blog-index','index')->name('blog.index');
    Route::get('doctor/blog-create','create')->name('blog.create');

    Route::post('doctor/blog-store','store')->name('blog.store');
});
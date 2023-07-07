<?php

use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminCityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminSpecialistController;
use App\Http\Controllers\Admin\AdminFacilityController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Hospital\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHospitalController;
use App\Http\Controllers\Admin\AdminHospitalTypeController;
use App\Http\Controllers\Admin\AdminSocialLinkController;
use App\Http\Controllers\Doctor\BlogController;
use App\Http\Controllers\Doctor\EducationController;
use App\Http\Controllers\Hospital\AppointmentController;
use App\Http\Controllers\Hospital\DoctorController;
use App\Http\Controllers\Hospital\FacilityController;
use App\Http\Controllers\Hospital\ScheduleController;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\Visitor\VisitorController;
use App\Http\Controllers\Admin\AdminStateController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ------------------ Visitor Side  -----------------------------------------
Route::get('/', [VisitorController::class, 'index'])->name('visitor.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//For state list in resgitration page
//Route::get('register', [RegisterController::class, 'state'])->name('register.state');
// Auth
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::controller(VisitorController::class)->group(function () {
        Route::get('hospitalDetails/{id?}', 'hospitalDetails')->name('visitor.hospitalDetails');
        Route::get('/profile', 'profile')->name('visitor.profile');
    });


    // ----------------------------------------Admin Side-------------------------------------------------

    // Admin State
    Route::controller(AdminStateController::class)->group(function () {
        Route::get('admin/state-index', 'index')->name('state.index');
        Route::get('admin/state-create', 'create')->name('state.create');
        Route::post('admin/state-store', 'store')->name('state.store');
        Route::get('admin/state-edit-{id?}', 'edit')->name('state.edit');
        Route::post('admin/state-update', 'update')->name('state.update');
        Route::get('admin/state-delete-{id?}', 'delete')->name('state.delete');
    });
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
        Route::get('admin/hospital-viewdetails-{id?}', 'viewDetails')->name('admin.hospital.viewdetails');
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

    //Admin Slider
    Route::controller(AdminSliderController::class)->group(function () {
        Route::get('admin/slider-index', 'index')->name('admin.slider.index');
        Route::get('admin/slider-create', 'create')->name('admin.slider.create');
        Route::post('admin/slider-store', 'store')->name('admin.slider.store');
        Route::get('admin/slider-edit-{id?}', 'edit')->name('admin.slider.edit');
        Route::post('admin/slider-update', 'update')->name('admin.slider.update');
        Route::get('admin/slider-delete-{id?}', 'delete')->name('admin.slider.delete');
    });

    //Admin Social Links
    Route::controller(AdminSocialLinkController::class)->group(function () {
        Route::get('admin/sociallink-index', 'index')->name('admin.sociallink.index');
        Route::get('admin/sociallink-create-{id?}', 'create')->name('admin.sociallink.create');
        Route::post('admin/sociallink-store', 'store')->name('admin.sociallink.store');
        Route::get('admin/sociallink-edit-{id?}', 'edit')->name('admin.sociallink.edit');
        Route::post('admin/sociallink-update', 'update')->name('admin.sociallink.update');
        Route::get('admin/sociallink-delete-{id?}', 'delete')->name('admin.sociallink.delete');
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
        Route::post('hospital/schedule-update', 'update')->name('schedule.update');
        Route::get('schedule-destroy-{id?}', 'destroy')->name('schedule.destroy');
    });
    Route::get('index', [AppointmentController::class, 'index'])->name('appointment.index');


    //Route::get('/', 'HomeController@index')->name('home');


    // --------------------------------------Doctor Side---------------------------------------------

    Route::controller(BlogController::class)->group(function () {

        Route::get('doctor/blog-index', 'index')->name('blog.index');

        Route::get('doctor/blog-create', 'create')->name('blog.create');
        Route::post('doctor/blog-store', 'store')->name('blog.store');

        Route::get('doctor/blog-edit-{id?}', 'edit')->name('blog.edit');
        Route::post('doctor/blog-update', 'update')->name('blog.update');

        Route::get('doctor/blog-destroy-{id?}', 'destroy')->name('blog.destroy');
    });

    Route::controller(EducationController::class)->group(function () {
        Route::get('doctor/education-index', 'index')->name('education.index');

        Route::get('doctor/education-create', 'create')->name('education.create');
        Route::post('doctor/education-store', 'store')->name('education.store');

        Route::get('doctor/education-edit-{id?}', 'edit')->name('education.edit');
        Route::post('doctor/education-update', 'update')->name('education.update');

        Route::get('doctor/education-destroy-{id?}', 'destroy')->name('education.destroy');
    });
});

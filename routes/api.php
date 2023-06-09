<?php

use App\Http\Controllers\Api\Admin\SliderController;
use App\Http\Controllers\Api\Doctor\BlogListController;
use App\Http\Controllers\Api\Doctor\CityListController;
use App\Http\Controllers\Api\Doctor\SpecialistController;
use App\Http\Controllers\Api\Doctor\HospitalListController;
use App\Http\Controllers\Api\Hospital\HospitalController;

use App\Http\Controllers\Doctor\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// specialist list
Route::get('specialist',[SpecialistController::class,'specialistList']);

//hospital List
Route::get('hospital',[HospitalListController::class,'HospitalList']);

//slider view
Route::get('slider',[SliderController::class,'slider']);

//city List
 Route::get('city',[CityListController::class,'cityList']);
 
 //Blog view
 Route::get('blog',[BlogListController::class,'blogView']);
 Route::get('blog/view/{id?}',[BlogListController::class,'blogList']);
  Route::get('search/{keyword}',[BlogListController::class,'search']);
 


 //singal hospital
 Route::get('hospital/view/{id?}',[HospitalController::class,'singlehospital']);
 


 //gallery
 Route::get('gallery/{id?}',[HospitalController::class,'gallery']);

 //doctor
 Route::get('doctor/{id?}',[HospitalController::class,'doctor']);

 //facility
 Route::get('facility/{id?}',[HospitalController::class,'facility']);
 

//sociallink
Route::get('sociallink/{id?}',[HospitalController::class,'socialLink']);

 //hospital type all data view
 Route::get('hospitaldata',[HospitalController::class,'hospitalView']);

 //hospitaltype list
 Route::get('hospitaltype/{id?}',[HospitalController::class,'hospitaltype']);

//hospital type wise hospital view
Route::get('hospitaltypeview/{id?}',[HospitalController::class,'hospitaltypeview']);



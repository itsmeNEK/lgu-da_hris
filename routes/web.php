<?php

use App\Http\Controllers\admin\Department;
use App\Http\Controllers\admin\PlantillaController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\hr\applicantController;
use App\Http\Controllers\hr\dashboard;
use App\Http\Controllers\hr\LeaveRecordController;
use App\Http\Controllers\hr\ManageApplicantsController;
use App\Http\Controllers\hr\pdsController;
use App\Http\Controllers\hr\PublicationController;
use App\Http\Controllers\hr\ServiceRecord;
use App\Http\Controllers\ipcrController;
use App\Http\Controllers\users\AccountController;
use App\Http\Controllers\users\application;
use App\Http\Controllers\users\CovidController;
use App\Http\Controllers\users\files;
use App\Http\Controllers\users\pds\CivilService;
use App\Http\Controllers\users\pds\Educational;
use App\Http\Controllers\users\pds\Family;
use App\Http\Controllers\users\pds\FamilyC;
use App\Http\Controllers\users\pds\LearningDevelopment;
use App\Http\Controllers\users\pds\OtherController;
use App\Http\Controllers\users\pds\OtherInformation;
use App\Http\Controllers\users\pds\Personal;
use App\Http\Controllers\users\pds\voluntaryWork;
use App\Http\Controllers\users\pds\WorkExperience;
use App\Http\Controllers\users\User;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'index'])->name('publication');
Auth::routes();

Route::group(['middleware'=>'auth','middleware'=>'role:0,1,2,3,4,5'], function () {
    Route::group(['prefix'=> '/users','as'=>'users.'], function () {

        Route::group(['prefix'=> '/pds','as'=>'pds.'], function () {
            Route::get('/', [User::class, 'index'])->name('index');
            Route::resource('/personal', Personal::class);
            Route::resource('/family', Family::class);
            Route::resource('/familyC', FamilyC::class);
            Route::resource('/educational', Educational::class);
            Route::resource('/civilservice', CivilService::class);
            Route::resource('/workexperience', WorkExperience::class);
            Route::resource('/voluntarywork', voluntaryWork::class);
            Route::resource('/learningdevelopment', LearningDevelopment::class);
            Route::resource('/otherinformation', OtherInformation::class);
            Route::resource('/other', OtherController::class);
        });
        Route::resource('/account', AccountController::class);
        Route::resource('/files', files::class);
        Route::resource('/covid', CovidController::class);
        Route::resource('/application', application::class);

        Route::patch('/application/{id}/resubmit', [application::class,'resubmit'])->name('application.resubmit');

        Route::delete('/application/{id}/delete', [application::class,'delete'])->name('application.delete');
        Route::post('/application/{id}/apply', [application::class, 'apply'])->name('application.apply');
        Route::get('/application/{id}/edit/{app_id}', [application::class, 'edit'])->name('application.edit');
        Route::patch('/application/{id}/update/{app_id}', [application::class, 'update'])->name('application.update');
    });
    #hr
    Route::group(['prefix'=> 'hr','as'=>'hr.','middleware'=>'role:0,4'], function () {
        Route::resource('/department', Department::class);
        Route::resource('/plantilla', PlantillaController::class);
        Route::resource('/leave', LeaveRecordController::class);
        Route::resource('/publication', PublicationController::class);
        Route::resource('/pms', ipcrController::class);
        Route::resource('/lnd', LearningDevelopment::class);
        Route::resource('/service', ServiceRecord::class);
        Route::resource('/dashboard', dashboard::class);
        Route::resource('/manage_applicants', ManageApplicantsController::class);
        Route::resource('/applicant', applicantController::class);
    });
    #admin
    Route::group(['prefix'=> 'admin','as'=>'admin.','middleware'=>'role:0'], function () {
        Route::resource('/user', UserController::class);
        Route::get('/user/{id}/reset', [User::class, 'reset'])->name('user.reset');
        Route::post('/user/{id}/activate', [User::class, 'activate'])->name('user.activate');
    });
});

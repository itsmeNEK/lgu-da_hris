<?php

use App\Http\Controllers\admin\Department;
use App\Http\Controllers\admin\PlantillaController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\hr\LeaveRecordController;
use App\Http\Controllers\hr\PublicationController;
use App\Http\Controllers\ipcrController;
use App\Http\Controllers\users\AccountController;
use App\Http\Controllers\users\pds\CivilService;
use App\Http\Controllers\users\pds\Educational;
use App\Http\Controllers\users\pds\Family;
use App\Http\Controllers\users\pds\FamilyC;
use App\Http\Controllers\users\pds\LearningDevelopment;
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

        Route::group(['prefix'=> '/pds','as'=>'pds.','middleware'=>'role:1,2,3,4,5'], function () {
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
        });
        Route::resource('/account', AccountController::class);
    });
    #hr
    Route::group(['prefix'=> 'hr','as'=>'hr.','middleware'=>'role:0,4'], function () {
        Route::resource('/plantilla', PlantillaController::class);
        Route::resource('/leave', LeaveRecordController::class);
        Route::resource('/publication', PublicationController::class);
        Route::resource('/pms', ipcrController::class);
        Route::resource('/lnd', LearningDevelopment::class);
    });
    #admin
    Route::group(['prefix'=> 'admin','as'=>'admin.','middleware'=>'role:0'], function () {
        Route::resource('/user', UserController::class);
        Route::resource('/department', Department::class);
        Route::get('/user/{id}/reset', [User::class, 'reset'])->name('user.reset');
        Route::post('/user/{id}/activate', [User::class, 'activate'])->name('user.activate');
    });
});

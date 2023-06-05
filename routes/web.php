<?php

use App\Http\Controllers\Announcement_controller;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\Claims;
use App\Http\Controllers\MY_Controller;
use App\Http\Controllers\Notes_controller;
use App\Http\Controllers\Notification_controller;
use App\Http\Controllers\Secret_generator_controller;
use App\Http\Controllers\teach_sub_controller;
use App\Http\Controllers\teachers_sub_list;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
/******************************** Checker ***************************/

Route::get('/check',[MY_Controller::class,'index']);
/****************************************************************************/

/******************************** Admin routes ***************************/
Route::prefix('admin')->group(function () {
    Route::get('/home', [Notification_controller::class, 'show']);
    Route::resource("/users",UsersController::class);
    Route::post('/admin/users/{user_id}', [UsersController::class, 'update']);
    Route::post('/admin/users/delete_user', [UsersController::class, 'destroy']);
});
/****************************************************************************/

/**************************** EXCEL Controllers ***************************/
Route::controller(ExcelController::class)->group(function(){
    Route::post('/admin/users/importP', 'importP')->name('admin.users.importP');
    Route::post('/admin/users/importT', 'importT')->name('admin.users.importT');
});
/****************************************************************************/

/******************************** Logout ***********************************/
   Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
         ->name('logout');
/*************************************************************************/

/******************************** Annoucements ***************************/
Route::resource("users/announcements",Notification_controller::class);
/****************************************************************************/

/******************************** VD routes ***************************/
Route::prefix('vd')->group(function () {
    Route::get('/home', [Notification_controller::class, 'show']);
    Route::resource('/code', Secret_generator_controller::class);
    Route::resource('/claims', Claims::class);
    Route::post('/claims/accept', [Claims::class, 'update']);
    Route::post('/claims/refuse', [Claims::class, 'update1']);
    Route::get("/announcementsList",[Announcement_controller::class,'show']);
    Route::post('announcementsList/create', [Announcement_controller::class,'store']);
    Route::post('announcementsList/{user_id}', [Announcement_controller::class, 'update']);
    Route::delete('announcementsList/delete', [Announcement_controller::class, 'destroy']);
});
/********************************************************************************************/

/*****************************************Teacher routes ************************************/
Route::prefix('teacher')->group(function () {
    Route::get('/home', [Notification_controller::class, 'show']);
    Route::resource('/grades', teachers_sub_list::class);
    Route::get('/final_grades/{id}', [Notes_controller::class,'index']);
    Route::post('/final_grades/store', [Notes_controller::class,'store']);
    Route::resource('/final_grades/notes', Notes_controller::class);
});
/*******************************************************************************************/

/************************************ Participants routes ***********************************/
Route::prefix('participant')->group(function () {
    Route::resource('/myclaims', Claims::class);
    Route::post('/myclaims/create', [Claims::class,'store']);
    Route::get('/home', [Notification_controller::class, 'show']);
    Route::view('fgrades', 'Participant.fgrades')->name('fgrades');
});
/********************************************************************************************/

/******************************************** CFD routes ***********************************/
Route::prefix('cfd')->group(function () {
    Route::get('/home', [Notification_controller::class, 'show']);
    Route::resource('/claims', Claims::class);

    Route::resource('/assignTeachers', teach_sub_controller::class);
    route::post("/assignTeachers/store",[teach_sub_controller::class,'store']);
    Route::post('/assignTeachers/get_teacher',[teach_sub_controller::class,'get_teacher'])->name('get_teacher'); Route::view('grades', 'CFD.shareGrades')->name('grades');
});
/*******************************************************************************************/

/*******************************************************************************************/

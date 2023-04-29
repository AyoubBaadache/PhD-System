<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\MY_Controller;
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
Route::get('/check',[MY_Controller::class,'index']);

//Admin routes
Route::prefix('admin')->group(function () {
    Route::view('home', 'Admin.AdminDash')->name('home');
    Route::view('announcements', 'Admin.Announcements')->name('announcements');
    Route::resource("/users",UsersController::class);
    Route::post('/admin/users/{user_id}', [UsersController::class, 'update']);
    Route::post('/admin/users/delete_user', [UsersController::class, 'destroy']);


});

Route::controller(ExcelController::class)->group(function(){
    Route::post('/admin/users/importP', 'importP')->name('admin.users.importP');
    Route::post('/admin/users/importT', 'importT')->name('admin.users.importT');
});
   Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
         ->name('logout');
//End Admin

//Vice Dean routes
Route::prefix('vd')->group(function () {
    Route::view('home', 'ViceDean.viceDeanDash')->name('DashVD');
    Route::view('code', 'ViceDean.code')->name('code');
    Route::view('announcementsList', 'ViceDean.announcementsList')->name('announce');
    Route::view('createAnnouncements', 'ViceDean.AnnounceCreate')->name('createAnnouncements');
    Route::view('announcements', 'ViceDean.Announcements')->name('announcements');
});
//End vice dean

//Teacher routes
Route::prefix('teacher')->group(function () {
    Route::view('grades', 'Teacher.grades')->name('grades');
    Route::view('announcements', 'Teacher.Announcements')->name('announcements');
});
//End teacher

// Participants routes
Route::prefix('participant')->group(function () {
    Route::view('fgrades', 'Participant.fgrades')->name('fgrades');
    Route::view('announcements', 'Participant.Announcements')->name('announcements');
});
//End Participant

//CFD routes
Route::prefix('cfd')->group(function () {
    Route::view('home', 'CFD.DashCFD')->name('DashCFD');
    Route::view('grades', 'CFD.shareGrades')->name('grades');
    Route::view('assignTeachers', 'CFD.AssignTeacher')->name('assignTeachers');
    Route::view('announcements', 'CFD.Announcements')->name('announcements');
});
//End CFD


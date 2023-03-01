<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentRegController;
use App\Http\Controllers\ProfileControlController;
use App\Http\Controllers\TeacherRegController;
use App\Http\Controllers\viewQuestionController;
use App\Http\Controllers\AssignmentController;
use App\Models\TeacherRegModel;

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

//routes for student module functions

Route::get('/', [StudentRegController::class, 'index']);
Route::get('go', [StudentRegController::class, 'index']);
Route::get('/student-account-creation', [StudentRegController::class, 'register'])->name('Register');
Route::post('/studentreg', [StudentRegController::class, 'studentreg']);
Route::post('login', [StudentRegController::class, 'login']);
Route::get('dashboard', [StudentRegController::class, 'dashboard']);
Route::get('logout', [StudentRegController::class, 'logout']);
Route::get('studante/updatedata/{id}', [ProfileControlController::class, 'dex'])->name('updatedetails');
Route::post('makeChange/{id}',[ProfileControlController::class, 'makeChange'])->name('makeChange');
Route::get('changePass/{id}',[ProfileControlController::class, 'changePass'])->name('changePass');
Route::post('changePassAction/{id}',[ProfileControlController::class, 'changePassAction'])->name('changePassAction');
Route::get('viewQuestion/{id}',[viewQuestionController::class, 'viewQuestion'])->name('viewQuestion');
Route::post('submitAns/{stu_id}/{ass_id}',[viewQuestionController::class, 'submitAns'])->name('submitAns');



//routes for teacher module functions
Route::get('teacher',[TeacherRegController::class,'index']);
Route::get('teacher-account-creation', [TeacherRegController::class, 'register'])->name('t_Register');
Route::post('teacherreg',[TeacherRegController::class,'teacherreg']);
Route::post('teacher_login',[TeacherRegController::class,'login']);
// Route::get('teacher_dashboard',[TeacherRegController::class,'dashboard']);
Route::get('teacher_dashboard',function(){
    return view('teacher_dashboard');
});
Route::get('teacher_logout',[TeacherRegController::class,'logout']);
Route::get('create_assignment',[AssignmentController::class,'index']);
Route::post('create_assignment',[AssignmentController::class,'store'])->name('create_assignment');
Route::get('teacher_view_assignment',[AssignmentController::class,'view']);
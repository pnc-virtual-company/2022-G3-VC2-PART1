<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentRequestController;
use App\Http\Controllers\AcceptedController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailController;

Route::post('/studentLogin', [LoginController::class , 'studentLogin']);
Route::post('/teacherLogin', [LoginController::class , 'teacherLogin']);

//forgot password mail routes
Route::post('/forgotPWTeacher/{email}', [EmailController::class , 'forgotPasswordTeacher']);
Route::post('/forgotPWStudent/{email}', [EmailController::class , 'forgotPasswordStudent']);

//route send mail after reset password
Route::post('/mailResetPWStudent/{id}', [EmailController::class , 'updatePasswordStudent']);
Route::post('/mailResetPWTeacher/{id}', [EmailController::class , 'updatePasswordTeacher']);

//route for  reset password
Route::put('/resetPWStd/{id}', [StudentController::class , 'forgotPassword']);
Route::put('/resetPWTeacher/{id}', [TeacherController::class , 'forgotPassword']);

Route::group(['middleware' => ['auth:sanctum']], function (){

    ///student routes
    Route::put('/student/reset_password/{id}', [StudentController::class , 'resetPassword']);
    Route::get('/countStudentReq/{id}', [StudentController::class , 'countStudentReq']);

    Route::post('/resetPassword/{id}', [StudentController::class , 'resetPassword']);
    Route::post('/approved/{status}/{id}', [StudentController::class , 'approved']);
    Route::apiResource('/student', StudentController::class);

    //request student routes
    Route::apiResource('/request', StudentRequestController::class);
    Route::get('/get_padding', [StudentRequestController::class, "get_padding"]);
    Route::put('request/update_status/{id}', [StudentRequestController::class, "update_status"]);


    // teacher routes
    Route::get('get_student_request/{student_id}', [StudentRequestController::class, "get_by_student"]);
    Route::apiResource('/teacher', TeacherController::class);
    Route::put('/teacher/reset_password/{id}', [TeacherController::class, 'resetPassword']);

    //student request routes
    Route::apiResource('/request', StudentRequestController::class);

    //send mailToStudent
    Route::get('/allEmails', [TeacherController::class , 'getAllEmails']);
    Route::get('/sendMail/{id}/{lt}/{mas}', [EmailController::class , 'sendMail']);
    Route::post('/studentMail/{reqId}/{status}', [EmailController::class , 'mailToStudent']);


    //User logout
    Route::post('/logout', [LoginController::class , 'logout']);

});











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

Route::get('get_student_request/{student_id}', [StudentRequestController::class, "get_by_student"]);
Route::post('/studentLogin', [LoginController::class , 'studentLogin']);
Route::post('/teacherLogin', [LoginController::class , 'teacherLogin']);
Route::post('/student', [StudentController::class , 'store']);
Route::post('/login', [LoginController::class , 'login']);
Route::post('/student', [StudentController::class , 'store']);
Route::get('/student', [StudentController::class , 'index']);
Route::get('/request', [StudentRequestController::class , 'index']);

Route::put('student/reset_password/{id}', [TeacherController::class, 'resetPassword']);
Route::put('/student/reset_password/{id}', [StudentController::class , 'resetPassword']);
Route::group(['middleware' => ['auth:sanctum']], function (){

    ///student routes
    Route::get('/countStudentReq/{id}', [StudentController::class , 'countStudentReq']);
    Route::get('/getReqStudent/{id}', [StudentController::class , 'getReqStudent']);
    // Route::post('/approved/{status}/{id}', [StudentController::class , 'approved']);

    //student CRUD
    Route::apiResource('/student', StudentController::class);

    //logout route

    Route::post('/logout', [LoginController::class , 'logout']);

    //teacher routes
    Route::apiResource('/student', StudentController::class);



    Route::group(['middleware' => ['auth:sanctum']], function (){

        ///student routes
        Route::get('/countStudentReq/{id}', [StudentController::class , 'countStudentReq']);
        Route::get('/getReqStudent/{id}', [StudentController::class , 'getReqStudent']);
        Route::post('/resetPassword/{id}', [StudentController::class , 'resetPassword']);
        Route::post('/approved/{status}/{id}', [StudentController::class , 'approved']);

    //student CRUD
    Route::apiResource('/student', StudentController::class);

});
    //logout route
    Route::post('/logout', [LoginController::class , 'logout']);

    //teacher routes
    // Route::apiResource('/student', StudentController::class);

});


Route::apiResource('/teacher', TeacherController::class);
Route::post('/logout', [LoginController::class , 'logout']);
// Route::post("/request", [StudentRequestController::class , 'store']);

Route::get('/allEmails',[TeacherController::class,'getAllEmails']);
Route::get('/sendMail/{id}/{lt}/{mas}',[EmailController::class,'sendMail']);

// Route::get("/request", [StudentRequestController::class , 'index']);

// Route::post('/student', [StudentController::class , 'store']);

// Route::get('/student', [StudentController::class , 'index']);





// ==========just test before login===================

// Route::post('/update_status/{reqId}/{status}', [StudentRequestController::class , 'update_status']);
Route::post('/studentMail/{reqId}/{status}', [EmailController::class , 'mailToStudent']);


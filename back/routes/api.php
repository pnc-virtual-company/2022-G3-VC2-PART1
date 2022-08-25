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

Route::post('/login', [LoginController::class , 'login']);
Route::post('/student', [StudentController::class , 'store']);
Route::get('/student', [StudentController::class , 'index']);


Route::put('/resetPassword/{id}', [StudentController::class , 'resetPassword']);
Route::group(['middleware' => ['auth:sanctum']], function (){

    ///student routes
    Route::get('/countStudentReq/{id}', [StudentController::class , 'countStudentReq']);
    Route::get('/getReqStudent/{id}', [StudentController::class , 'getReqStudent']);
    Route::post('/approved/{status}/{id}', [StudentController::class , 'approved']);

    //student CRUD
    Route::apiResource('/teacher', StudentController::class);

    //logout route
    
    
    
    
    
    
});
Route::apiResource('/teacher', TeacherController::class);
Route::post('/logout', [LoginController::class , 'logout']);
Route::post("/request", [StudentRequestController::class , 'store']);

Route::get('/allEmails',[TeacherController::class,'getAllEmails']);
Route::get('/sendMail/{id}/{lt}/{mas}',[EmailController::class,'sendMail']);
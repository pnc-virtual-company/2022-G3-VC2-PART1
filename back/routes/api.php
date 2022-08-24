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


Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/student', [StudentController::class , 'index']);
    Route::get('/student/{id}', [StudentController::class , 'show']);
    Route::post('/logout', [LoginController::class , 'logout']);


});

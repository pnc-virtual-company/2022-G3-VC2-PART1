<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentRequestController;
use App\Http\Controllers\AcceptedController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;


Route::post('/login', [App\Http\Controllers\LoginController::class , 'login']);
Route::post('/register', [App\Http\Controllers\StudentController::class , 'store']);

// Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/student', [App\Http\Controllers\StudentController::class , 'index']);
    Route::delete('/student/{id}', [App\Http\Controllers\StudentController::class , 'destroy']);
    Route::put('/student/{id}', [App\Http\Controllers\StudentController::class , 'update']);
    Route::post('/logout', [App\Http\Controllers\LoginController::class , 'logout']);

// });

// Route::group(['namespace' => 'Admin'], function () {
// // Controllers Within The "App\Http\Controllers\Admin" Namespace
// });

// //student routes
Route::get("/student", [StudentController::class , 'index']);
Route::get("/student/{id}", [StudentController::class , 'show']);
Route::delete("/student/{id}", [StudentController::class , 'destroy']);
Route::put("/student/{id}", [StudentController::class , 'update']);
Route::post("/student", [StudentController::class , 'store']);
// Route::post("/student", [StudentController::class , 'updateRequest']);
// Route::delete("/student/{id}", [StudentController::class , 'deleteRequest']);
// Route::delete("/studentReq/{id}", [StudentController::class , 'makeRequest']);


// //teacher routes
Route::get("/teacher", [TeacherController::class , 'index']);
Route::delete("/teacher/{id}", [TeacherController::class , 'destroy']);
Route::put("/teacher/{id}", [TeacherController::class , 'update']);
Route::post("/teacher", [TeacherController::class , 'store']);
Route::get("/teacher/{id}", [TeacherController::class , 'show']);


// //request routes
Route::get("/request", [StudentRequestController::class , 'index']);
Route::delete("/request/{id}", [StudentRequestController::class , 'destroy']);
Route::put("/request/{id}", [StudentRequestController::class , 'update']);
Route::post("/request", [StudentRequestController::class , 'store']);
Route::get("/request/{id}", [StudentRequestController::class , 'show']);

// //request routes
Route::get("/accept", [AcceptedController::class , 'index']);
Route::delete("/accept/{id}", [AcceptedController::class , 'destroy']);
Route::put("/accept/{id}", [AcceptedController::class , 'update']);
Route::post("/accept/{id}", [AcceptedController::class , 'store']);
Route::get("/accept/{id}", [AcceptedController::class , 'show']);

// // find student request
Route::get("/stdReq/{id}", [StudentController::class , 'getReqStudent']);

// find how many student request for day off
Route::get("/countRequest/{id}", [StudentController::class , 'countStudentReq']);

// find the request of student which one is approved or not
Route::get("/approved/{allow}/{stdID}", [StudentController::class , 'approved']);

// update img
Route::put("/img/{id}", [StudentController::class , 'img']);

// //admine route
// Route::get("/admin", [AdminController::class , 'index']);

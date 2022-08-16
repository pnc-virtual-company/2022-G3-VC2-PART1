<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentRequestController;
use App\Http\Controllers\AcceptedController;



// Route::group(['middleware' => ['auth:sanctum']], function () {

//     Route::post('item', [App\Http\Controllers\ItemsController::class , 'store']);
//     Route::delete('items/{id}', [App\Http\Controllers\UserController::class , 'destroy']);
//     Route::put('items/{id}', [App\Http\Controllers\UserController::class , 'update']);
//     Route::post('logout', [App\Http\Controllers\UserController::class , 'logout']);

// });

//student routes
Route::get("/student",[StudentController::class,'index']);
Route::get("/student/{id}", [StudentController::class , 'show']);
Route::delete("/student/{id}",[StudentController::class,'destroy']);
Route::put("/student/{id}",[StudentController::class,'update']);
Route::post("/student",[StudentController::class,'store']);

//teacher routes
Route::get("/teacher", [TeacherController::class , 'index']);
Route::delete("/teacher/{id}", [TeacherController::class , 'destroy']);
Route::put("/teacher/{id}", [TeacherController::class , 'update']);
Route::post("/teacher", [TeacherController::class , 'store']);
Route::get("/teacher/{id}", [TeacherController::class , 'show']);


//request routes
Route::get("/request", [StudentRequestController::class , 'index']);
Route::delete("/request/{id}", [StudentRequestController::class , 'destroy']);
Route::put("/request/{id}", [StudentRequestController::class , 'update']);
Route::post("/request", [StudentRequestController::class , 'store']);
Route::get("/request/{id}", [StudentRequestController::class , 'show']);

//request routes
Route::get("/accept", [AcceptedController::class , 'index']);
Route::delete("/accept/{id}", [AcceptedController::class , 'destroy']);
Route::put("/accept/{id}", [AcceptedController::class , 'update']);
Route::post("/accept/{id}", [AcceptedController::class , 'store']);
Route::get("/accept/{id}", [AcceptedController::class , 'show']);

// find student request
Route::get("/stdReq/{id}", [StudentController::class , 'getReqStudent']);
// find how many student request for day off
Route::get("/countDayoff/{id}", [StudentController::class , 'countStudentReq']);
// find aprove or not
Route::get("/approved/{id}", [StudentController::class , 'approved']);

//update img
Route::put("/img/{id}",[StudentController::class,'img']);


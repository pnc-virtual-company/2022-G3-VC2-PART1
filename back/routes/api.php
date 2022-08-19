<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentRequestController;
use App\Http\Controllers\AcceptedController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;


// Route::post('/login', [App\Http\Controllers\LoginController::class , 'login']);
// Route::post('/register', [App\Http\Controllers\StudentController::class , 'store']);
// Route::get('/student', [App\Http\Controllers\StudentController::class , 'index']);



Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get("/student", 'StudentController@index');

});

Route::controller(StudentController::class)->group(function () {
    Route::post("/student", 'store');
    Route::get("/logout", 'logout');
    Route::get("/student", 'index');
    Route::put("/student", 'updateRequest');
    Route::get("/student/{id}", 'deleteRequest');
    Route::get("/studentReq/{id}", 'makeRequest');
});

// Route::get("/student", [StudentController:
Route::controller(TeacherController::class)->group(function () {
    Route::get("/teacher",  'index');
    Route::delete("/teacher/{id}", 'destroy');
    Route::put("/teacher/{id}", 'update');
    Route::post("/teacher", 'store');
    Route::get("/teacher/{id}", 'show');
});

// //request routes
Route::controller(StudentRequestController::class)->group(function () {
    Route::get("/request", 'index');
    Route::delete("/request/{id}", 'destroy');
    Route::put("/request/{id}", 'update');
    Route::post("/request", 'store');
    Route::get("/request/{id}", 'show');
});

// //accept routes
Route::controller(StudentRequestController::class)->group(function () {
    Route::get("/accept", 'index');
    Route::delete("/accept/{id}", 'destroy');
    Route::put("/accept/{id}", 'update');
    Route::post("/accept", 'store');
    Route::get("/accept/{id}", 'show');
});


// // find student request
// Route::get("/stdReq/{id}", [StudentController::class , 'getReqStudent']);

// find how many student request for day off
// Route::get("/countRequest/{id}", [StudentController::class , 'countStudentReq']);

// find the request of student which one is approved or not
// Route::get("/approved/{allow}/{stdID}", [StudentController::class , 'approved']);

//update img
// Route::put("/img/{id}", [StudentController::class , 'img']);

// //admine route
// Route::get("/admin", [AdminController::class , 'index']);
// Route::post("/sendMail", [MailController::class , 'sendMail']);

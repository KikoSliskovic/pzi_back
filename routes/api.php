<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LectureController;



Route::post('/login', [AuthController::class, 'login']);
// test get route

Route::post('/logout',[AuthController::class,'logout'])->middleware(['auth','web']);


Route::get('/user', [AuthController::class, 'getUser'])->middleware(['auth', 'web']);
// Route::get('/lectures', [LectureController::class, 'getLectures'])->middleware(['web','auth']);

Route::get('/professors',[ProfessorController::class,'getProfessors'])->middleware(['auth', 'web']);

Route::get('/classrooms',[ClassroomController::class,'getClassrooms'])->middleware(['auth', 'web']);

Route::get('/subjects',[SubjectController::class,'getSubjects'])->middleware(['auth', 'web']);

Route::get('/lectures',[LectureController::class,'getLectures'])->middleware(['auth', 'web']);





//Route::get('/classrooms', function () {
//    return Classroom::with('organisation')->get();
//});


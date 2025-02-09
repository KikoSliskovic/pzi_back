<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\ProfessorController;
use App\Models\UJOrganizacija;

Route::post('/login', [AuthController::class, 'login']);
// test get route

Route::get('/user',[AuthController::class, 'getUser'])->middleware('auth:sanctum');

//Route::get('/classrooms', function () {
//    return Classroom::with('organisation')->get();
//});

Route::get('/subjects', [SubjectController::class, 'vraca_json']);
Route::get('/classrooms', [ClassroomController::class, 'vraca_json']);
Route::get('/lectures', [LectureController::class, 'vraca_json']);
Route::get('/professors', [ProfessorController::class, 'vraca_json']);


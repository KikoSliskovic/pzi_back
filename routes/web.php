<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UJController;
use App\Models\Korisnik;
use App\Http\Controllers\QRCodeController;


Route::get('/', function () {
    return view('welcome');
});

#QR KOD
Route::post('/generate-qr', [QRCodeController::class, 'generate']);
Route::get('/qr-code/{value}', [QRCodeController::class, 'show'])->name('qr-code.show');
Route::get('/qr-code/{value}/url', [QRCodeController::class, 'showUrl'])->name('qr-code.showUrl');



Route::get('/classroom', [ClassroomController::class, 'index'])->name('classrooms.index');
Route::get('/clasroom_json', [SubjectController::class, 'vraca_json'])->name('classrooms.index');
Route::get('/classroom/create', [ClassroomController::class, 'create'])->name('classrooms.create');
Route::post('/classroom', [ClassroomController::class, 'store'])->name('classrooms.store');
Route::get('/classroom/{classroom}/edit', [ClassroomController::class, 'edit'])->name('classrooms.edit');
Route::put('/classroom/{classroom}/update', [ClassroomController::class, 'update'])->name('classrooms.update');
Route::delete('/classroom/{classroom}/delete', [ClassroomController::class, 'delete'])->name('classrooms.delete');


Route::get('/lecture', [LectureController::class, 'index'])->name('lectures.index');
Route::get('/lecture_json', [LectureController::class, 'vraca_json'])->name('lectures.index');
Route::get('/lecture/create', [LectureController::class, 'create'])->name('lectures.create');
Route::post('/lecture', [LectureController::class, 'store'])->name('lectures.store');
Route::get('/lecture/{lecture}/edit', [LectureController::class, 'edit'])->name('lectures.edit');
Route::put('/lecture/{lecture}/update', [LectureController::class, 'update'])->name('lectures.update');
Route::delete('/lecture/{lecture}/delete', [LectureController::class, 'delete'])->name('lectures.delete');


Route::get('/korisnik', [KorisnikController::class, 'index'])->name('korisnici.index');
Route::get('/korisnik/create', [KorisnikController::class, 'create'])->name('korisnici.create');
Route::post('/korisnik', [KorisnikController::class, 'store'])->name('korisnici.store');
Route::get('/korisnik/{korisnik}/edit', [KorisnikController::class, 'edit'])->name('korisnici.edit');
Route::put('/korisnik/{korisnik}/update', [KorisnikController::class, 'update'])->name('korisnici.update');
Route::delete('/korisnik/{korisnik}/delete', [KorisnikController::class, 'delete'])->name('korisnici.delete');


Route::get('/organisation', [UJController::class, 'index'])->name('organisations.index');
// Route::get('/organisation', [UJController::class, 'index2'])->name('organisations.index');
Route::get('/organisation/create', [UJController::class, 'create'])->name('organisations.create');
Route::post('/organisation', [UJController::class, 'store'])->name('organisations.store');
Route::delete('/organisation/{organisation}/delete', [UJController::class, 'delete'])->name('organisations.delete');


Route::get('/subject', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subject_json', [SubjectController::class, 'vraca_json'])->name('subjects.index');
Route::get('/subject/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subject', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subject/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/subject/{subject}/update', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/subject/{subject}/delete', [SubjectController::class, 'delete'])->name('subjects.delete');


Route::get('/professor', [ProfessorController::class, 'index'])->name('professors.index');
Route::get('/professor_json', [ProfessorController::class, 'vraca_json'])->name('professors.index');
Route::get('/professor/create', [ProfessorController::class, 'create'])->name('professors.create');
Route::post('/professor', [ProfessorController::class, 'store'])->name('professors.store');
Route::get('/professor/{professor}/edit', [ProfessorController::class, 'edit'])->name('professors.edit');
Route::put('/professor/{professor}/update', [ProfessorController::class, 'update'])->name('professors.update');
Route::delete('/professor/{professor}/delete', [ProfessorController::class, 'delete'])->name('professors.delete');


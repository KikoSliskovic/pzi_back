<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
// test get route

Route::get('/user',[AuthController::class, 'getUser'])->middleware('auth:sanctum');
<?php
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\YourController;

Route::get('/example', [YourController::class, 'index']);

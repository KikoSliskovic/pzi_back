<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/add-user', function () {
    $user = new User();
    $user->name = 'Marko Maric';
    $user->email = 'marko.maric@example.com';
    $user->password = Hash::make('password'); // Obavezno hashirajte lozinku
    $user->save();

    return 'User added successfully';
});
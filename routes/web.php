<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index'); 

Route::get('/home', [HomeController::class, 'homepage'])->name('homepage'); 

Route::get('/team/{id}', [HomeController::class, 'showTeam'])->name('team.show');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/submit', [AuthController::class, 'submitLogin'])->name('submit.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
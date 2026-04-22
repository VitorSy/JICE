<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Models\Game;
use Illuminate\Support\Facades\Route;

Route::get('/teste', function(){
    dd(Game::with(['teamOne', 'teamTwo', 'place', 'modal'])->get()->toArray());
});

Route::get('/', [HomeController::class, 'index'])->name('index'); 

Route::get('/home/{section}', [HomeController::class, 'homepage'])->name('homepage'); 

Route::get('/team/{id}', [HomeController::class, 'showTeam'])->name('team.show');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/submit', [AuthController::class, 'submitLogin'])->name('submit.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/games_store', [HomeController::class, 'gamesStore'])->name('games.store');

Route::post('/games_filter', [HomeController::class, 'gamesFilter'])->name('games.filter');
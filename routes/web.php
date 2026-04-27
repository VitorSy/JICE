<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Models\Game;
use Illuminate\Support\Facades\Route;

Route::get('/teste', function(){
    $game = Game::find(4)->toArray();
    dd($game['date']);
});

Route::get('/', [HomeController::class, 'index'])->name('index'); 

Route::get('/home/{section}/{category?}', [HomeController::class, 'homepage'])->name('homepage'); 

Route::get('/set/{category}', [HomeController::class, 'setCategory'])->name('set.category'); 

Route::get('/team/{id}', [HomeController::class, 'showTeam'])->name('team.show');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/submit', [AuthController::class, 'submitLogin'])->name('submit.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/games_store', [HomeController::class, 'gamesStore'])->name('games.store');

Route::patch('/games_update', [HomeController::class, 'gamesUpdateScore'])->name('games.updateScore');

Route::post('/games_filter', [HomeController::class, 'gamesFilter'])->name('games.filter');

Route::get('/games_edit/{game_id}/{category?}', [HomeController::class, 'gamesEdit'])->name('games.edit');

Route::get('/modal/{modal_id}/{category}', [HomeController::class, 'modal'])->name('modal');
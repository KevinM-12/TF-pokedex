<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/', [PokemonController::class,'welcome']);
Route::get('/pokemon/{id}', [PokemonController::class, 'show']);
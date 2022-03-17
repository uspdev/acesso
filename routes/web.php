<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\PredioController;

Route::get('/',[AcessoController::class,'index']);
Route::get('acessos',[AcessoController::class,'index']);
Route::get('acessos/create',[AcessoController::class,'create']);
Route::post('acessos',[AcessoController::class,'store']);

Route::get('predios',[PredioController::class,'index']);
Route::get('predios/create',[PredioController::class,'create']);
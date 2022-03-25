<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\PredioController;
use App\Http\Controllers\UserController;

Route::get('/',[IndexController::class,'index']);
Route::get('acessos',[AcessoController::class,'index']);
Route::get('acessos/create/{predio}',[AcessoController::class,'create']);
Route::post('acessos',[AcessoController::class,'store']);
Route::get('acessos/{acesso}',[AcessoController::class,'show']);

Route::get('predios',[PredioController::class,'index']);
Route::get('predios/create',[PredioController::class,'create']);
Route::post('predios',[PredioController::class,'store']);

Route::get('usuarios',[UserController::class,'index']);
Route::get('usuarios/create',[UserController::class,'create']);
Route::post('usuarios',[UserController::class,'store']);
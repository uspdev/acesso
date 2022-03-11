<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcessoController;

Route::get('/',[AcessoController::class,'index']);
Route::get('acessos',[AcessoController::class,'index']);
Route::get('acessos/create',[AcessoController::class,'create']);
Route::post('acessos',[AcessoController::class,'store']);

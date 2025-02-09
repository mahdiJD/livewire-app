<?php

use App\Http\Controllers\PanelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin',[PanelController::class,'index'])->name('panel');
Route::resource('user', UserController::class);
Route::get('/', function () {
    return view('welcome');
});

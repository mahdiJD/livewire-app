<?php

use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::get('/admin',[PanelController::class,'index']);
Route::get('/', function () {
    return view('welcome');
});

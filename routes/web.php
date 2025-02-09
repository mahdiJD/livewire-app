<?php

use App\Http\Controllers\PanelController;
use App\Http\Controllers\UserController;
use App\Livewire\Admin2\Panel\Index;
use App\Livewire\Admin2\Uesr\UsersCreate;
use App\Livewire\Admin2\Uesr\UsersList;
use Illuminate\Support\Facades\Route;

Route::get('/admin',[PanelController::class,'index'])->name('panel');
Route::resource('user', UserController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin2',Index::class)->name('panel2');
Route::get('/admin2/user_create',UsersCreate::class)->name('user.create2');
Route::get('/admin2/user_list',UsersList::class)->name('user.list2');

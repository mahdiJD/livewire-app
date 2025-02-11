<?php

use App\Livewire\Admin\Panel\Index;
use App\Livewire\Admin\Uesr\UsersList;
use Illuminate\Support\Facades\Route;


Route::get('',Index::class)->name('panel');
Route::get('/users',UsersList::class)->name('user.index');


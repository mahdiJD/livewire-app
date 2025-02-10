<?php

use App\Http\Controllers\PanelController;
use App\Http\Controllers\UserController;
use App\Livewire\Admin\Panel\Index;
use App\Livewire\Admin\Uesr\UsersCreate;
use App\Livewire\Admin\Uesr\UsersList;
use App\Livewire\Front\CourseDetaile;
use App\Livewire\Front\Courses;
use App\Livewire\Front\Home;
use Illuminate\Support\Facades\Route;

// Route::get('/admin',[PanelController::class,'index'])->name('panel');
// Route::resource('user', UserController::class);

Route::get('/',Home::class)->name('home');
Route::get('/courses',Courses::class)->name('courses');
Route::get('/course_detail',CourseDetaile::class)->name('course_detail');

Route::get('/admin',Index::class)->name('panel');
Route::get('/admin/user_create',UsersCreate::class)->name('user.create');
Route::get('/admin/user_list',UsersList::class)->name('user.index');

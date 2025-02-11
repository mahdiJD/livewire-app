<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Panel\Index;
use App\Livewire\Admin\Uesr\UsersList;
use App\Livewire\Front\CourseDetaile;
use App\Livewire\Front\Courses;
use App\Livewire\Front\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/courses',Courses::class)->name('courses');
Route::get('/courses_detaile',CourseDetaile::class)->name('courses.detaile');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// require __DIR__.'/admin.php';

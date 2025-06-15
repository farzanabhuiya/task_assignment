<?php

use App\Http\Controllers\Backend\CoursesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomePageController;



Auth::routes();

                  //homepage route
 Route::get('/', [HomePageController::class, 'index'])->name('Frontend.homePage');
                  
                  
                   //dashboard route
 Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'dashboard'])->name('backend.dashboard');
      


 
Route::get('/courses/create', [CoursesController::class, 'create'])->name('courses.create');
Route::post('/courses', [CoursesController::class, 'store'])->name('courses.store');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');

 





<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/',
        [\App\Http\Controllers\DashboardController::class, 'index']
    )->name('dashboard');

    Route::resource('course', \App\Http\Controllers\CoursesController::class);

    Route::resource('school', \App\Http\Controllers\SchoolController::class);
});

require __DIR__ . '/auth.php';

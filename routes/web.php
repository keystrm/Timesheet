<?php

use App\Http\Controllers\DashboardContorller;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

    Route::middleware('admin')->prefix('admin/dashboard')->group(function(){
        Route::get('/',[DashboardContorller::class,'index']);
        Route::get('/tasks',[DashboardContorller::class,'tasks']);
        Route::post('/search',[DashboardContorller::class,'search']);
        Route::get('/reports',[DashboardContorller::class,'reports']);

    });

    Route::middleware('user')->prefix('user/dashboard')->group(function(){
        Route::get('/',[DashboardContorller::class,'index']);

    });

    Route::resource('projects',ProjectController::class);
    Route::resource('tasks',TaskController::class);
    

});

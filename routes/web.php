<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ScheduleController;
use 
App\Http\Controllers\ExcutedController;

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

/*API*/ 
Route::middleware('auth')->get('api/profile', [HomeController::class, 'profile']);
Route::middleware('auth')->get('api/memo', [MemoController::class, 'memo']);

/*ROUTE*/
Route::group(['middleware' => 'auth'], function () {
    // Route::get('/{any}', function () {
    //     return view('home');
    // })->where('any', '.*');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/memo', [MemoController::class, 'index'])->name('memo');
    Route::post('/save', [MemoController::class, 'save'])->name('save');

    Route::get('/idea', [IdeaController::class, 'index'])->name('idea');
    
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
    
    Route::get('/excuted', [ExcutedController::class, 'index'])->name('excuted');
});

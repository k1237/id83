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
Route::middleware('auth')->get('api/csrf', [HomeController::class, 'csrf']);

Route::middleware('auth')->get('api/profile', [HomeController::class, 'profile']);

Route::middleware('auth')->get('api/memo', [MemoController::class, 'memo']);

/*ステータス1のアイデア*/
Route::middleware('auth')->get('api/idea', [ScheduleController::class, 'idea']);

/*ステータス2のアイデア*/
Route::middleware('auth')->get('api/idea2', [ExcutedController::class, 'idea2']);



/*ROUTE*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/{any}', function () {
        return view('home');
    })->where('any', '.*');

    Route::post('/save', [MemoController::class, 'save'])->name('save');

    Route::post('/add', [IdeaController::class, 'add'])->name('add');

    Route::post('/store', [ScheduleController::class, 'store'])->name('store');

    Route::post('/delete', [ExcutedController::class, 'delete'])->name('delete');
});

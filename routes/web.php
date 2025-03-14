<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RouteController::class, 'homePage']);

Route::get('/showroom', [PostController::class, 'showroom']);
Route::get('/showroom/{post}', [PostController::class, 'singleVehicle']);

Route::get('/search/{term}', [PostController::class, 'search']);

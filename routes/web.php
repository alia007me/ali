<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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

Route::get('/', [PersonController::class, 'index']);

Route::get('/add', [PersonController::class, 'add']);
Route::post('/add', [PersonController::class, 'create']);

Route::get('/delete/{id}', [PersonController::class, 'delete']);

Route::get('/update/{id}', [PersonController::class, 'edit']);
Route::post('/update/{id}', [PersonController::class, 'update']);

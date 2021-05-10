<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'index']);
Route::get('cchart', [DashboardController::class, 'c_chart']);
Route::get('pchart', [DashboardController::class, 'p_chart']);
Route::get('npchart', [DashboardController::class, 'np_chart']);
Route::get('pareto', [DashboardController::class, 'pareto']);

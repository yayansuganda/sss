<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\RunController;
use App\Http\Controllers\Spc_variabelController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\Upload_fileController;
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

Route::get('/', [DashboardController::class, 'index_variabel']);
Route::get('cchart', [DashboardController::class, 'c_chart']);
Route::get('pchart', [DashboardController::class, 'p_chart']);
Route::get('npchart', [DashboardController::class, 'np_chart']);
Route::get('pareto', [DashboardController::class, 'pareto']);
Route::get('uchart', [DashboardController::class, 'u_chart']);
Route::get('gchart', [DashboardController::class, 'g_chart']);
Route::get('tchart', [DashboardController::class, 't_chart']);


Route::get('xmr_individuals', [Spc_variabelController::class, 'xmr_individuals']);
Route::get('xmr_median_r', [Spc_variabelController::class, 'xmr_median_r']);
Route::get('xmr_trend', [Spc_variabelController::class, 'xmr_trend']);


Route::get('special_cusum', [SpecialController::class, 'special_cusum']);

Route::get('run_average', [RunController::class, 'run_average']);
Route::get('run_median', [RunController::class, 'run_median']);


 Route::resources([
        'upload_file' => Upload_fileController::class,
        'perusahaan' => PerusahaanController::class,
        'department' => DepartmentController::class
    ]);
Route::post('/table/data/upload_file', [Upload_fileController::class, 'isi_datatable'])->name('table.upload_file');
Route::post('/table/data/perusahaan', [PerusahaanController::class, 'isi_datatable'])->name('table.perusahaan');
Route::post('/table/data/department', [DepartmentController::class, 'isi_datatable'])->name('table.department');
Route::get('create/department/{id}', [DepartmentController::class, 'create2'])->name('department.create2');
Route::get('department/ajax/{id}', [Upload_fileController::class, 'department']);

Route::get('atribut', [DashboardController::class, 'index_atribut']);
Route::get('variabel', [DashboardController::class, 'index_variabel']);
Route::get('special', [DashboardController::class, 'index_special']);
Route::get('line', [DashboardController::class, 'index_line']);
Route::get('pareto', [DashboardController::class, 'index_pareto']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesRoutingController;

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

Route::get('/', [SalesRoutingController::class, 'showStore']);

Route::get('/store', [SalesRoutingController::class, 'showStore'])->name('store');
Route::get('/sales', [SalesRoutingController::class, 'showSales'])->name('sales');
Route::get('/routes', [SalesRoutingController::class, 'showRoutes'])->name('schedule');
Route::get('/routes-export', [SalesRoutingController::class, 'export'])->name('schedule.export');

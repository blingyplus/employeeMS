<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('employees', EmployeeController::class);
    Route::get('/employee-count', [EmployeeController::class, 'count']);
    Route::get('/export-excel', [EmployeeController::class, 'exportExcel'])->name('employees.exportExcel');
    Route::post('/import-excel', [EmployeeController::class, 'importExcel'])->name('employees.importExcel');
    Route::get('/export-pdf', [EmployeeController::class, 'exportPdf'])->name('employees.exportPdf');
});

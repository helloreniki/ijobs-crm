<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/comms/create', [CommsController::class, 'create'])->name('comm.create');
Route::post('/comms', [CommsController::class, 'store'])->name('comm.store');

Route::get('/comms/{comm}/edit', [CommsController::class, 'edit'])->name('comm.edit');
Route::post('/comms/{comm}', [CommsController::class, 'update'])->name('comm.update');

Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('company.show');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/{employee}/comms', [EmployeeController::class, 'show'])->name('employee.show');

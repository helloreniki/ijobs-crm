<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommController;
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

Route::get('/comms/create', [CommController::class, 'create'])->name('comm.create');
Route::post('/comms', [CommController::class, 'store'])->name('comm.store');

Route::get('/comms/{comm}/edit', [CommController::class, 'edit'])->name('comm.edit');
Route::post('/comms/{comm}', [CommController::class, 'update'])->name('comm.update');

Route::delete('/comms/{comm}', [CommController::class, 'destroy'])->name('comm.destroy');

Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/companies', [CompanyController::class, 'store'])->name('company.store');
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::post('/companies/{company}', [CompanyController::class, 'update'])->name('company.update');
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('company.show');


Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::get('/employees/{employee}/comms', [EmployeeController::class, 'show'])->name('employee.show');

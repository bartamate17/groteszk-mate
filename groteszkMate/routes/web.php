<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Mail\NewCompanyReminderMail;

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

//LOGIN - ROUTES
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//COMPANY - ROUTES
Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('createCompany');
Route::post('/company/register', [App\Http\Controllers\CompanyController::class, 'store'])->name('companyRegister');
Route::get('/company/{id}/edit', [App\Http\Controllers\CompanyController::class, 'edit'])->name('companyedit');
Route::put('/company/{id}/edit/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('companyUpdate');
Route::match(['delete', 'get'], '/company/delete/{id}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('companyDestroy');

//EMPLOYEE - ROUTES
Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('/employee/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('createEmployee');
Route::post('/employee/register', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employeeRegister');
Route::get('/employee/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employeeEdit');
Route::put('/employee/{id}/edit/update', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employeeUpdate');
Route::match(['delete', 'get'], '/employee/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employeeDestroy');

//EMAIL
Route::get('/email', function () {
    Mail::to('info@tableadmin.com')->send(new NewCompanyReminderMail());
    return new NewCompanyReminderMail();
});


/* --- ANOMALY ---
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function () {

    //LOGIN - ROUTES
    Auth::routes();
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //COMPANY - ROUTES
    Route::get('/company', [App\Http\Controllers\companyController::class, 'index'])->name('company');
    Route::get('/company/create', [App\Http\Controllers\companyController::class, 'create'])->name('createCompany');
    Route::post('/company/register', [App\Http\Controllers\companyController::class, 'store'])->name('companyRegister');
    Route::get('/company/{id}/edit', [App\Http\Controllers\companyController::class, 'edit'])->name('companyedit');
    Route::put('/company/{id}/edit/update', [App\Http\Controllers\companyController::class, 'update'])->name('companyUpdate');
    Route::match(['delete', 'get'], '/company/delete/{id}', [App\Http\Controllers\companyController::class, 'destroy'])->name('companyDestroy');

    //EMPLOYEE - ROUTES
    Route::get('/employee', [App\Http\Controllers\employeeController::class, 'index'])->name('employee');
    Route::get('/employee/create', [App\Http\Controllers\employeeController::class, 'create'])->name('createEmployee');
    Route::post('/employee/register', [App\Http\Controllers\employeeController::class, 'store'])->name('employeeRegister');
    Route::get('/employee/{id}/edit', [App\Http\Controllers\employeeController::class, 'edit'])->name('employeeEdit');
    Route::put('/employee/{id}/edit/update', [App\Http\Controllers\employeeController::class, 'update'])->name('employeeUpdate');
    Route::match(['delete', 'get'], '/employee/delete/{id}', [App\Http\Controllers\employeeController::class, 'destroy'])->name('employeeDestroy');
});
*/
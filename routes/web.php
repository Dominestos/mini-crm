<?php

use App\Http\Controllers\Admin\CompaniesController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::group(['namespace' => 'Company','prefix' => 'companies'], function() {
        Route::get('/', 'IndexController')->name('companies.index');
        Route::get('/create', 'CreateController')->name('companies.create');
        Route::post('/', 'StoreController')->name('companies.store');
        Route::get('/{company}', 'ShowController')->name('companies.show');
        Route::get('/{company}/edit', 'EditController')->name('companies.edit');
        Route::patch('/{company}', 'UpdateController')->name('companies.update');
        Route::delete('/{company}', 'DestroyController')->name('companies.destroy');
    });
    Route::group(['namespace' => 'Employee','prefix' => 'employees'], function() {
        Route::get('/', 'IndexController')->name('employees.index');
        Route::get('/create', 'CreateController')->name('employees.create');
        Route::post('/', 'StoreController')->name('employees.store');
        Route::get('/{employee}', 'ShowController')->name('employees.show');
        Route::get('/{employee}/edit', 'EditController')->name('employees.edit');
        Route::patch('/{employee}', 'UpdateController')->name('employees.update');
        Route::delete('/{employee}', 'DestroyController')->name('employees.destroy');
    });
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

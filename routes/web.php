<?php

use App\Http\Controllers\Admin\CompaniesController;
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
    Route::group(['controller' => CompaniesController::class,'prefix' => 'companies'], function() {
        Route::get('/', 'index')->name('companies.index');
        Route::get('/create', 'create')->name('companies.create');
        Route::post('/', 'store')->name('companies.store');
        Route::get('/{company}', 'show')->name('companies.show');
        Route::get('/{company}/edit', 'edit')->name('companies.edit');
        Route::patch('/{company}', 'update')->name('companies.update');
        Route::delete('/{company}', 'destroy')->name('companies.destroy');
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

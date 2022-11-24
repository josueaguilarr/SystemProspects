<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProspectsController;

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

//Routes for Auth
Auth::routes();

//Route for login
Route::get('/', function () {
    return view('login');
});

//Route for home/dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Routes for Prospects CRUD
Route::get('/prospects', [App\Http\Controllers\ProspectsController::class, 'index'])->name('prospects');
Route::get('/prospects/add', [App\Http\Controllers\ProspectsController::class, 'create'])->name('prospects.create');
Route::post('/prospects/store', [App\Http\Controllers\ProspectsController::class, 'store'])->name('prospects.store');
Route::put('/prospects/update/{prospects}', [App\Http\Controllers\ProspectsController::class, 'update'])->name('prospects.update');
Route::get('/prospects/show/{prospects}', [App\Http\Controllers\ProspectsController::class, 'show'])->name('prospects.show');


// Route for download documents
Route::get('{file}', [App\Http\Controllers\ProspectsController::class, 'downloadFile'])->name('downloadFile');
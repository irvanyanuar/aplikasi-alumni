<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CollegeController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return View('dashboard.index');
})->name('home');

Route::get('/tes', function () {
    return View('template.index');
});

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/', [AdminController::class, 'store'])->name('admin.store');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

Route::prefix('/college')->group(function () {
    Route::get('/', [CollegeController::class, 'index'])->name('college.index');
    Route::get('/create', [CollegeController::class, 'create'])->name('college.create');
    Route::get('/edit/{id}', [CollegeController::class, 'edit'])->name('college.edit');
    Route::post('/', [CollegeController::class, 'store'])->name('college.store');
    Route::post('/update/{id}', [CollegeController::class, 'update'])->name('college.update');
    Route::post('/destroy/{id}', [CollegeController::class, 'destroy'])->name('college.destroy');
});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\AlumniController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\EducationHistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegencyController;
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

Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::get('/tes', function () {
    return View('template.index');
});

Route::prefix('/user')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('user.admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('user.admin.create');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('user.admin.edit');
        Route::post('/', [AdminController::class, 'store'])->name('user.admin.store');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('user.admin.update');
        Route::post('/destroy/{id}', [AdminController::class, 'destroy'])->name('user.admin.destroy');
    });

    Route::prefix('/alumni')->group(function () {
        Route::get('/', [AlumniController::class, 'index'])->name('user.alumni.index');
        Route::get('/create', [AlumniController::class, 'create'])->name('user.alumni.create');
        Route::get('/edit/{id}', [AlumniController::class, 'edit'])->name('user.alumni.edit');
        Route::post('/', [AlumniController::class, 'store'])->name('user.alumni.store');
        Route::post('/update/{id}', [AlumniController::class, 'update'])->name('user.alumni.update');
        Route::post('/destroy/{id}', [AlumniController::class, 'destroy'])->name('user.alumni.destroy');
    });
});

Route::prefix('/college')->group(function () {
    Route::get('/', [CollegeController::class, 'index'])->name('college.index');
    Route::get('/create', [CollegeController::class, 'create'])->name('college.create');
    Route::get('/edit/{id}', [CollegeController::class, 'edit'])->name('college.edit');
    Route::post('/', [CollegeController::class, 'store'])->name('college.store');
    Route::post('/update/{id}', [CollegeController::class, 'update'])->name('college.update');
    Route::post('/destroy/{id}', [CollegeController::class, 'destroy'])->name('college.destroy');
});

Route::prefix('/regency')->group(function () {
    Route::get('/', [RegencyController::class, 'index'])->name('regency.index');
});

Route::prefix('/profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::post('/', [ProfileController::class, 'store'])->name('profile.store');
    Route::post('/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/destroy/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('/education')->group(function () {
        Route::get('/', [EducationHistoryController::class, 'index'])->name('profile.education.index');
        Route::get('/create', [EducationHistoryController::class, 'create'])->name('profile.education.create');
        Route::get('/edit/{id}', [EducationHistoryController::class, 'edit'])->name('profile.education.edit');
        Route::post('/', [EducationHistoryController::class, 'store'])->name('profile.education.store');
        Route::post('/update/{id}', [EducationHistoryController::class, 'update'])->name('profile.education.update');
        Route::post('/destroy/{id}', [EducationHistoryController::class, 'destroy'])->name('profile.education.destroy');
    });
});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

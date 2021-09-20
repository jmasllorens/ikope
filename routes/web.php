<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SeminarController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    
    Route::get('/seminars', [SeminarController::class, 'index'])->name('seminars');

    Route::get('/publications', function () {
        return Inertia::render('Publications');
    })->name('publications');

    Route::get('/patients', function () {
        return Inertia::render('Patients');
    })->name('patients');
    
    Route::get('/contact', function () {
        return Inertia::render('Contact');
    })->name('contact');

    Route::get('/profile', function() {
        return Inertia::render('Profile');
    })->name('profile');

});

require __DIR__.'/auth.php';

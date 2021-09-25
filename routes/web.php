<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\NoteController;

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
    Route::get('/seminars/create', [SeminarController::class, 'create'])->name('seminars_create');
    Route::post('/seminars/store', [SeminarController::class, 'store'])->name('seminars_store');
    Route::get('/seminars/{id}/edit', [SeminarController::class, 'edit'])->name('seminars_edit');
    Route::patch('/seminars/{id}/update', [SeminarController::class, 'update'])->name('seminars_update');
    Route::delete('/seminars/{id}', [SeminarController::class, 'delete'])->name('seminars_delete');
    Route::get('/seminars/{id}', [SeminarController::class, 'show'])->name('show');
    Route::get('/subscribe/{id}', [SeminarController::class, 'subscribe'])->name('subscribe');
    Route::get('/unsubscribe/{id}', [SeminarController::class, 'unsubscribe'])->name('unsubscribe');

    Route::patch('/profile/{id}/update', [UserController::class, 'update'])->name('profile_update');

    Route::get('/patients', [PatientController::class, 'index'])->name('patients');
    Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients_show');
    Route::get('/patients/{id}/sessions&notes', [PatientController::class, 'getSessions'])->name('patients_sessions');
    Route::get('/patientscreate', [PatientController::class, 'create'])->name('patients_create');
    Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients_edit');
  


  Route::get('/sessions&notes', [SessionController::class, 'index'])->name('sessions');
  Route::get('/sessionscreate', [SessionController::class, 'create'])->name('sessions_create');
  

 

Route::get('/patients/{id}/sessions&notes/{sId}', [SessionController::class, 'show'])->name('sessions_show');
Route::get('/patients/{id}/sessions&notes/{sId}/edit', [SessionController::class, 'edit'])->name('sessions_edit');


    Route::get('/publications', function () {
        return Inertia::render('Publications');
    })->name('publications');

    Route::get('/users', function () {
        $user = Auth::user();
        if ($user->isAdmin)
        {
            return Inertia::render('Admin/Users');
        }
            return redirect()->route('dashboard');

    })->name('users');
    
    Route::get('/contact', function () {
        $user = Auth::user();
        if (!$user->isAdmin)
        {
            return Inertia::render('User/Contact');
        }
            return redirect()->route('dashboard');

    })->name('contact');

    Route::get('/profile', [UserController::class, function() {
        $user = Auth::user();
        return Inertia::render('Profile', ['user' => $user]);
    }])->name('profile');

});

require __DIR__.'/auth.php';

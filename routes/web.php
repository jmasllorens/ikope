<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PublicationController;
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
    Route::get('/myseminars', [SeminarController::class, 'mySeminars'])->name('my_seminars');
    Route::get('/seminars/create', [SeminarController::class, 'create'])->name('seminars_create');
    Route::post('/seminars/store', [SeminarController::class, 'store'])->name('seminars_store');
    Route::get('/seminars/{id}/edit', [SeminarController::class, 'edit'])->name('seminars_edit');
    Route::patch('/seminars/{seminar}/update', [SeminarController::class, 'update'])->name('seminars_update');
    Route::delete('/seminars/{id}', [SeminarController::class, 'delete'])->name('seminars_delete');
    Route::get('/seminars/{id}', [SeminarController::class, 'show'])->name('show');
    Route::get('/seminars/{id}/subscribers', [SeminarController::class, 'subscribers'])->name('subscribers');
    Route::get('/subscribe/{id}', [SeminarController::class, 'subscribe'])->name('subscribe');
    Route::get('/unsubscribe/{id}', [SeminarController::class, 'unsubscribe'])->name('unsubscribe');

    Route::patch('/profile/{id}/update', [UserController::class, 'update'])->name('profile_update');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users_delete');
    Route::delete('/users', [UserController::class, 'deleteAll'])->name('users_deleteAll');
    Route::get('/adminusers', [UserController::class, 'indexAdmins'])->name('users_admin');
    Route::get('/adminusers/{id}', [UserController::class, 'getAdmin'])->name('admins_show');
    Route::delete('/adminusers/{user}', [UserController::class, 'destroyAdmin'])->name('admins_delete');
  

    Route::get('/patients', [PatientController::class, 'index'])->name('patients');
    Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients_show');
    Route::get('/patientscreate', [PatientController::class, 'create'])->name('patients_create');
    Route::post('/patients/store', [PatientController::class, 'store'])->name('patients_store');
    Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients_edit');
    Route::patch('patients/{id}/update', [PatientController::class, 'update'])->name('patients_update');
    Route::delete('/patients/{id}', [PatientController::class, 'delete'])->name('patients_delete');

    Route::get('/patients/{id}/sessions', [PatientController::class, 'getSessions'])->name('patients_sessions');
    Route::get('/patients/{id}/sessions/{sId}', [PatientController::class, 'showSession'])->name('sessions_show');
    Route::get('patients/{id}/sessionscreate', [PatientController::class, 'createSession'])->name('sessions_create');
    Route::post('patients/{id}/sessions/store', [PatientController::class, 'storeSession' ])->name('sessions_store');
    Route::get('/patients/{id}/sessions/{sId}/edit', [PatientController::class, 'editSession'])->name('sessions_edit');
    Route::patch('/patients/{id}/sessions/{sId}/update', [PatientController::class, 'updateSession'])->name('sessions_update');
    Route::delete('/session/{id}/', [PatientController::class, 'deleteSessions'])->name('session_delete');
  

  
    Route::get('patients/{id}/sessions/{sId}/create', [PatientController::class, 'createNote'])->name('notes_create');
    Route::post('patients/{id}/sessions/{sId}/store', [PatientController::class, 'storeNote'])->name('notes_store');
    Route::get('/patients/{id}/sessions/{sId}/{nId}/edit', [PatientController::class, 'editNote'])->name('notes_edit');
    Route::patch('/patients/{id}/sessions/{sId}/{nId}/update', [PatientController::class, 'updateNote'])->name('notes_update');
    Route::delete('/note/{id}/', [PatientController::class, 'deleteNotes'])->name('note_delete');
   
  

    Route::get('/sessions', [SessionController::class, 'index'])->name('sessions');
    Route::delete('/sessions/{id}/', [SessionController::class, 'delete'])->name('delete');
    Route::get('/sessions/{id}/edit', [SessionController::class, 'edit'])->name('edit');
    Route::patch('/sessions/{id}/update', [SessionController::class, 'update'])->name('update');

    Route::get('/publications/index', [PublicationController::class, 'index'])->name('publications_index');
    Route::get('/publications/{id}', [PublicationController::class, 'get'])->name('publications_get');
    Route::post('/publications/store', [PublicationController::class, 'store'])->name('publications_store');
    Route::patch('/publications/{publication}/update', [PublicationController::class, 'update'])->name('publications_update');
    Route::delete('/publications/{publication}', [PublicationController::class, 'destroy'])->name('publications_delete');

    Route::post('/contactMail', [UserController::class, 'contactMail']);



    Route::get('/publications', function () {
        return Inertia::render('Publications');
    })->name('publications');

    
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

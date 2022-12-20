<?php

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
//1st parameter = name of the controller,
//2nd parameter = the name of the function that exist in the controller

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['auth.verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('tasksPage', [TasksController::class, 'tasksPage'])->name('tasksPage');

    Route::get('/createTaskForm', [TasksController::class, 'createTaskForm'])->name('createTaskForm');

    Route::post('/createNewTask', [TasksController::class, 'createNewTask'])->name('createNewTask'); //landing page of the client

    Route::get('/rejectTask/{id}', [TasksController::class, 'rejectTask'])->name('rejectTask');

    Route::get('/userAdmin', [TasksController::class, 'userAdmin'])->name('userAdmin');

    Route::get('/deleteTask', [TasksController::class, 'deleteTask'])->name('deleteTask');

    Route::get('/waitingTask', [TasksController::class, 'waitingTask'])->name('waitingTask');

    Route::get('/completedTask', [TasksController::class, 'completedTask'])->name('completedTask');

    Route::get('/rejectedTask', [TasksController::class, 'rejectedTask'])->name('rejectedTask');

    Route::get('/inProgressTask', [TasksController::class, 'inProgressTask'])->name('inProgressTask');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/acceptTask{task_id}', [TasksController::class, 'acceptTask'])->name('acceptTask');    

    // Route::post('sendMssage/{id}', [TasksController::class, 'sendMssage'])->name('sendMssage');
    Route::get('taskDone/{id}', [TasksController::class, 'taskDone'])->name('taskDone');
    
    Route::get('acceptedBy/{task_id}', [TasksController::class, 'acceptedBy'])->name('acceptedBy');

   

    
});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/createTaskForm');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

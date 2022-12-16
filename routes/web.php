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
    return view('welcome');
});

Auth::routes(['auth.verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('tasksPage', [TasksController::class, 'tasksPage'])->name('tasksPage');

    Route::get('/createTaskForm', [TasksController::class, 'createTaskForm']);

    Route::post('/createNewTask', [TasksController::class, 'createNewTask'])->name('createNewTask'); //landing page of the client

    //the id in here has to match with the key id in tasksPage.php. the controller will receive the $id
    Route::get('/editTaskForm/{id}', [TasksController::class, 'editTaskForm'])->name('editTaskForm');

    Route::post('editTask', [TasksController::class, 'editTask'])->name('editTask');

    Route::get('/userAdmin', [TasksController::class, 'userAdmin'])->name('userAdmin');

    Route::get('/deleteTask', [TasksController::class, 'deleteTask'])->name('deleteTask');

    Route::get('/waitingTask', [TasksController::class, 'waitingTask'])->name('waitingTask');

    Route::get('/completedTask', [TasksController::class, 'completedTask'])->name('completedTask');

    Route::get('/rejectedTask', [TasksController::class, 'rejectedTask'])->name('rejectedTask');

    Route::get('/inProgressTask', [TasksController::class, 'inProgressTask'])->name('inProgressTask');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //it will shares the same name as the getrequest
    Route::post('createTaskForm', [TasksController::class, 'sendTask']);
    // ...
});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

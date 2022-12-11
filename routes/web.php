<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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



Route::get('/', function(){
    return view('welcome');
});

Route::get('tasksPage', [TasksController::class, 'tasksPage'])->name('tasksPage');

Route::get('/createTaskForm', [TasksController::class, 'createTaskForm']);

Route::post('/createNewTask', [TasksController::class, 'createNewTask'])->name('createNewTask');

//the id in here has to match with the key id in taskPage.php. the controller will receive the $id
Route::get('/editTaskForm/{id}', [TasksController::class, 'editTaskForm'])->name('editTaskForm');

Route::post('editTask', [TasksController::class, 'editTask'])->name('editTask');

Route::get('/userAdmin', [TasksController::class, 'userAdmin'])->name('userAdmin');

Route::get('/deleteTask', [TasksController::class, 'deleteTask'])->name('deleteTask');

Auth::routes();

Route::get('/home', function () {
    return view('home');
});

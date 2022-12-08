<?php

use App\Http\Controllers\TasksController;
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
//1st parameter = name of the controller,
//2nd parameter = the name of the function that exist in the controller

Route::get('/', [TasksController::class, 'index']);

Route::get('/our_page', function(){
    return view('ourpage');
});

Route::get('/createTaskForm', [TasksController::class, 'createTaskForm']);

Route::post('/createNewTask', [TasksController::class, 'createNewTask'])->name('createNewTask');

//the id in here has to match with the key id in index.php. the controller will receive the $id
Route::get('/editTaskForm/{id}', [TasksController::class, 'editTaskForm'])->name('editTaskForm');

Route::post('editTask', [TasksController::class, 'editTask'])->name('editTask');
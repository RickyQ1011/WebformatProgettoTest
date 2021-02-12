<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
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

//welcome.blade --> View with link for employees, projects and tasks
Route::get('/', [Controller::class, 'index']);

/* EMPLOYEES ROUTES
employees.blade --> View to manage all stuffs of employees such as complete list of emploees, single page for each employee ...
*/

Route::get('/employees', [EmployeesController::class, 'index']);
Route::get('/employee/edit/{id}', [EmployeesController::class, 'edit']);
Route::get('/employee/create', [EmployeesController::class, 'create']);
Route::get('/employee/{id}', [EmployeesController::class, 'show']);
Route::post('/employee/store', [EmployeesController::class, 'store']);
Route::post('/employee/addTask', [EmployeesController::class, 'assignTask']);
Route::post('/employee/update/{id}', [EmployeesController::class, 'update']);
Route::get('/employee/delete/{id}', [EmployeesController::class, 'deleteTask']);

/* TASK ROUTES
tasks.blade --> View to manage all stuffs about tasks
*/
Route::get('/tasks', [TasksController::class, 'index']);
Route::get('/task/edit/{id}', [TasksController::class, 'edit']);
Route::get('/task/{id}', [TasksController::class, 'show']);
Route::get('/task/create', [TasksController::class, 'create']);
Route::post('/task/store', [TasksController::class, 'store']);
Route::post('/task/update/{id}', [TasksController::class, 'update']);


/* PROJECTS ROUTES
projects.blade --> View to manage all stuffs about projects (cross projecyts) 
*/
Route::get('/projects', [ProjectsController::class, 'index']);
Route::get('/project/edit/{id}', [ProjectsController::class, 'edit']);
Route::get('/project/{id}', [ProjectsController::class, 'show']);
Route::get('/project/create', [ProjectsController::class, 'create']);
Route::post('/project/store', [ProjectsController::class, 'store']);
Route::post('/project/update/{id}', [ProjectsController::class, 'update']);
<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/tasks/new/{content}', function($content) {
    Task::create([
        'content' => $content,
    ]);
    $response = ['status' => 'ok'];
    return json_encode($response);
});

Route::get('api/tasks/all', function() {
    $tasks = Task::all();
    $response = [
        'status' => 'ok',
        'tasks' => $tasks,
    ];
    return json_encode($response);
});

Route::get('api/tasks/show/{id}', function($id) {
    $task = Task::find($id);
    $response = [
        'status' => 'ok',
        'task' => $task,
    ];
    return json_encode($response);
});

Route::get('api/tasks/delete/{id}', function($id) {
    $task = Task::find($id);
    $task->delete();
    $response = [
        'status' => 'ok',
    ];
    return json_encode($response);
});


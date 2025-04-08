<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TasksController;

Route::get('/', [TasksController::class, 'index']);
Route::get('/task/{id}', [TasksController::class, 'getOne']);

Route::prefix('tasks')->group(function () {
    Route::post('/insert', [TasksController::class, 'insert']);
    Route::delete('/delete' , [TasksController::class, 'delete']);
    Route::patch('/update', [TasksController::class, 'update']);
    Route::patch('/mark', [TasksController::class, 'markAsComplete']);
});

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add/task', [ToDoController::class, 'add_task'])->name('add-task');
    Route::post('/store/task', [ToDoController::class, 'store'])->name('store-task');
    Route::get('/display/task', [ToDoController::class, 'display_taks'])->name('display-task');
    Route::get('/edit/task/page/{task}', [ToDoController::class, 'edittask_page'])->name('edit-task-page');
    Route::put('/edit/task/{task}', [ToDoController::class, 'edit_task'])->name('edit-task');
    Route::delete('/delete/task/{task}', [ToDoController::class, 'delete_task'])->name('delete-task');

    Route::get('/pending/task', [ToDoController::class, 'pending_task'])->name('pending-task');
    Route::get('/high/priority/task', [ToDoController::class, 'high_priority_task'])->name('high-priority-task');
});

require __DIR__.'/auth.php';

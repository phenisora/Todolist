<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('index');
});


Route::get('/index', [TaskController::class, 'index'])->name('tasks.index');
Route::Post('/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/update', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
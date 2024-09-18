<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JokeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jokes', [JokeController::class, 'index'])->name('jokes.index');
Route::post('/jokes', [JokeController::class, 'store'])->name('jokes.store');
Route::get('/jokes/{id}/edit', [JokeController::class, 'edit'])->name('jokes.edit');
Route::put('/jokes/{id}', [JokeController::class, 'update'])->name('jokes.update');
Route::delete('/jokes/{id}', [JokeController::class, 'destroy'])->name('jokes.destroy');
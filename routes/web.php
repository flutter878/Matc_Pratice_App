<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MathController;

Route::get('/', [MathController::class, 'index'])->name('math.index');
Route::post('/answer', [MathController::class, 'checkAnswer'])->name('math.answer');
Route::post('/reset-score', [MathController::class, 'resetScore'])->name('math.resetScore');


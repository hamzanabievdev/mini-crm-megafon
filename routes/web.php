<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\AppealController;

Route::get('/', [AuthController::class, 'index'])->name('main.index');
Route::get('/appeals/{id}', [AppealController::class, 'index'])->name('appeals.index');
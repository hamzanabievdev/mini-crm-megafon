<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AppealController;
use App\Http\Controllers\Api\CommentController;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/users', [UserController::class, 'list']);
    Route::post('/users/search', [UserController::class, 'search']);

    Route::post('/appeal', [AppealController::class, 'create']);
    Route::put('/appeal/{id}', [AppealController::class, 'update']);
    Route::get('/appeals', [AppealController::class, 'index']);
    Route::get('/appeals/{id}', [AppealController::class, 'show']);
    Route::post('/appeals/search', [AppealController::class, 'search']);

    Route::get('/comments', [CommentController::class, 'list']);
    Route::post('/comment', [CommentController::class, 'create']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.logout');
});

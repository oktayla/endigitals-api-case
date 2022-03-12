<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\CampusController;
use App\Http\Controllers\Api\StudentController;

Route::prefix('v1')->group(function() {

    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);

        Route::group(['prefix' => 'countries'], function() {
            Route::get('all', [CountryController::class, 'index']);
            Route::post('add', [CountryController::class, 'add']);
            Route::post('update/{id}', [CountryController::class, 'update']);
            Route::delete('delete/{id}', [CountryController::class, 'delete']);
        });

        Route::group(['prefix' => 'schools'], function() {
            Route::get('all', [SchoolController::class, 'index']);
            Route::post('add', [SchoolController::class, 'add']);
            Route::post('update/{id}', [SchoolController::class, 'update']);
            Route::delete('delete/{id}', [SchoolController::class, 'delete']);
        });

        Route::group(['prefix' => 'campuses'], function() {
            Route::get('all', [CampusController::class, 'index']);
            Route::post('add', [CampusController::class, 'add']);
            Route::post('update/{id}', [CampusController::class, 'update']);
            Route::delete('delete/{id}', [CampusController::class, 'delete']);
        });

        Route::group(['prefix' => 'students'], function() {
            Route::get('all', [StudentController::class, 'index']);
            Route::post('add', [StudentController::class, 'add']);
            Route::post('update/{id}', [StudentController::class, 'update']);
            Route::delete('delete/{id}', [StudentController::class, 'delete']);
        });
    });
});
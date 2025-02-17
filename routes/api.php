<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api', 'auth:sanctum']], function () {
    Route::post(
        '/userById',
        [
            \App\Http\Controllers\APIs\UserController::class,
            'userById'
        ]
    )->name('user.by.id');

    Route::post(
        '/userWithDatatable',
        [
            \App\Http\Controllers\APIs\UserController::class,
            'userWithDatatable'
        ]
    )->name('user.with.datatable');


});


Route::put('/users/update', [
    \App\Http\Controllers\APIs\UserController::class,
    'updateApi'
])->name('user.update');

Route::delete('/users/delete', [
    \App\Http\Controllers\APIs\UserController::class,
    'deleteApi'
])->name('user.delete');

<?php

use App\Http\Controllers\Api\PostApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('cors')->prefix('posts')->group(function () {
    Route::get('/' , [PostApiController::class , 'list'])->name('posts.list');
    Route::post('/' , [PostApiController::class , 'create'])->name('posts.create');
    Route::patch('/{id}' , [PostApiController::class , 'update'])->name('posts.update');
    Route::delete('/{id}' , [PostApiController::class , 'delete'])->name('posts.delete');
    Route::get('/{id}' , [PostApiController::class , 'read'])->name('posts.read');
});

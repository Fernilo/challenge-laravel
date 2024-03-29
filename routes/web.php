<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post' , PostController::class)->middleware(['auth']);
Route::get('contacto' , [ContactoController::class,'index'])->middleware(['auth'])->name('contacto.index');
Route::post('contacto' , [ContactoController::class,'send'])->middleware(['auth'])->name('contacto.send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GesController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('articles', [GesController::class, 'index'])->name('articles.index');

Route::get('articles/create', [GesController::class, 'create'])->name('articles.create');

Route::post('articles', [GesController::class, 'store'])->name('articles.store');

Route::get('articles/{article}/edit', [GesController::class, 'edit'])->name('articles.edit');

Route::put('articles/{article}', [GesController::class, 'update'])->name('articles.update');

Route::delete('articles/{article}', [GesController::class, 'destroy'])->name('articles.destroy');

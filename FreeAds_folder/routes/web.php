<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
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

Route::get('/', [AdController::class, 'index']);
Route::get('/newpost', [AdController::class, 'addPost'])->name('newpost')->middleware('verified');
Route::post('/newpost', [AdController::class, 'create'])->name('newpost')->middleware('verified');

Route::get('/dashboard/{id}',[AdController::class,'delete'])->name('delete');

Route::get('/show/{id}',[AdController::class,'show'])->name('show')->middleware('verified');

Route::get('/edit/{id}', [AdController::class,'edit'])->name('edit')->middleware('verified');
Route::put('/edit/{id}', [AdController::class,'update'])->name('edit')->middleware('verified');

Route::get('/search',[AdController::class,'search'])->name('search')->middleware('verified');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AdController::class, 'showUserPost'])->name('dashboard');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjetoController;

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

Route::get('/', [IndexController::class, 'index'])->name('site.index');
Route::put('/enviarContato', [IndexController::class, 'enviarContato'])->name('site.enviarContato');
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::get('/projeto', [ProjetoController::class, 'index'])->name('site.projeto');
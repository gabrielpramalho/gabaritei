<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\CorrecaoController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/prova', [ProvaController::class, 'index'] )->name('prova');
Route::post('/gerar-pdf', [ProvaController::class, 'store'] )->name('gerar-pdf'); 
Route::get('/20q', [ProvaController::class, 'quest'] )->name('quest'); 

Route::get('/corrigir', [CorrecaoController::class, 'index'] )->name('corrigir');




require __DIR__.'/auth.php';

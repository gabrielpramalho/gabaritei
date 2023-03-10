<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\CorrecaoController;
use App\Http\Controllers\GabaritoController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/prova', [ProvaController::class, 'index'] )->middleware(['auth'])->name('prova');
Route::post('/gerar-pdf', [ProvaController::class, 'store'] )->middleware(['auth'])->name('gerar-pdf'); 


Route::get('/corrigir', [CorrecaoController::class, 'index'] )->middleware(['auth'])->name('corrigir');
Route::get('/corrigir-prova', [CorrecaoController::class, 'test'] )->middleware(['auth'])->name('corrigir-prova');
Route::post('/corrigir-prova', [CorrecaoController::class, 'corrigir'] )->middleware(['auth'])->name('corrigir-prova');
Route::get('gabaritos/provas/{id}', [ProvaController::class, 'show_provas'] )->middleware(['auth'])->name('gabaritos/provas');
Route::get('gabaritos/provas/prova/{id}', [CorrecaoController::class, 'show_prova'] )->middleware(['auth'])->name('gabaritos/provas/provas');


Route::get('/gabarito', [GabaritoController::class, 'index'] )->middleware(['auth'])->name('gabarito');
Route::get('/gabaritos', [GabaritoController::class, 'show'] )->middleware(['auth'])->name('gabaritos');
Route::post('/gabarito/questoes', [GabaritoController::class, 'questoes'] )->middleware(['auth'])->name('gabarito/questoes');
Route::post('/gabarito/questoes-respondidas/{qtd}', [GabaritoController::class, 'gabarito'] )->middleware(['auth'])->name('gabarito/questoes-respondidas');






require __DIR__.'/auth.php';

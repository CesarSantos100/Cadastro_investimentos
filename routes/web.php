<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Investimento;

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

Route::get('/', [Investimento::class, 'index']);
Route::get('/user', [Investimento::class, 'lista']);
Route::post('/cadastro', [Investimento::class, 'create']);
Route::get('/editar/{id}', [Investimento::class, 'editar']);
Route::post('/editar/{id}', [Investimento::class, 'store']);
//Route::post('salvar', [Investimento::class, 'salvar']);
Route::post('/excluir/{id}', [Investimento::class, 'delete']);
Route::get('/auth', [Investimento::class, 'login']);



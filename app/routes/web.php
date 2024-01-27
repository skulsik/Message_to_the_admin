<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

// API ---------------------------------------------------------------------------------
// Создание сообщения
Route::post('/api/create_message/', [App\Http\Controllers\APIController::class, 'create_message'])->name('api.create_message');
// Получение csrf токена
Route::get('/api/get_token/', [App\Http\Controllers\APIController::class, 'get_token'])->name('get_token');

Auth::routes();

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

// Список сообщений
Route::get('/admin/list_messages', [App\Http\Controllers\MessageController::class, 'list_messages'])->name('list_messages');
// Удалить сообщение
Route::get('/admin/delete_message/{id}', [App\Http\Controllers\MessageController::class, 'delete_message'])->name('delete_message');

// Admin - изменение почты администратора
// Форма для изменения почты
Route::get('/admin/form_admin_email', [App\Http\Controllers\AdminController::class, 'form_admin_email'])->name('form_admin_email');
// Обновление почты
Route::post('/api/update_admin_email/', [App\Http\Controllers\AdminController::class, 'update_admin_email'])->name('update_admin_email');

// API ---------------------------------------------------------------------------------
// Создание сообщения
Route::post('/api/create_message/', [App\Http\Controllers\APIController::class, 'create_message'])->name('api.create_message');
// Для тестов --------------
// Получение csrf токена
Route::get('/api/get_token/', [App\Http\Controllers\APIController::class, 'get_token'])->name('get_token');

Auth::routes();

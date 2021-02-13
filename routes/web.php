<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramController;

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

Route::post('webhookupdates', [App\Http\Controllers\TelegramController::class, 'webhookUpdates'])->name('telegram.webhookupdates');

Route::get('updates', [App\Http\Controllers\TelegramController::class, 'updates'])->name('telegram.updates');

Route::get('enviarmensaje', [App\Http\Controllers\TelegramController::class, 'enviar'])->name('telegram.enviar');

Route::get('enviartest', [App\Http\Controllers\TelegramController::class, 'enviartest'])->name('telegram.enviartest');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
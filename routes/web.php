<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramController;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Http\Controllers\LloroController;

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

Route::post('webhookupdates', function(){
    $update = Telegram::commandsHandler(true);
    return $update;
});

Route::get('enviartest', [App\Http\Controllers\TelegramController::class, 'enviartest'])->name('telegram.enviartest');

//Route::get('tiempo', [App\Http\Controllers\TiempoController::class, 'index'])->name('tiempo.index');

Route::get('lloros', [App\Http\Controllers\LloroController::class, 'index'])->name('lloro.index');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


//[App\Http\Controllers\TelegramController::class, 'webhookUpdates'])->name('telegram.webhookupdates');
//Route::get('updates', [App\Http\Controllers\TelegramController::class, 'updates'])->name('telegram.updates');
//Route::post('webhookupdates', [App\Http\Controllers\TelegramController::class, 'webhookUpdates'])->name('telegram.webhookupdates');
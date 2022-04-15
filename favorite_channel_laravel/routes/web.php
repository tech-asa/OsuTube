<?php

use Illuminate\Support\Facades\Route;

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
// Route::post('/', [App\Http\Controllers\ChannelController::class, 'home'])->name('home');
// 表示用
Route::get('/channel', [App\Http\Controllers\ChannelController::class, 'create'])->name('channel.create');
// 投稿を押した時
Route::post('/channel', [App\Http\Controllers\ChannelController::class, 'store'])->name('channel.store');

Auth::routes();
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
Route::get('/channel', [App\Http\Controllers\ChannelController::class, 'index'])->name('channel.index');
// 表示用
Route::get('/edit_confirm', [App\Http\Controllers\ChannelController::class, 'create'])->name('channel.create');
// 投稿を押した時
Route::post('/edit_confirm', [App\Http\Controllers\ChannelController::class, 'store'])->name('channel.store');

Route::get('/mypage', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
Route::get('/mypage_edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
Route::post('/mypage_edit', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');

Auth::routes();
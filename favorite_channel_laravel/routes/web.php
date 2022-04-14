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

Auth::routes();

//投稿フォームページ
Route::get('/channel', 'ChannelController@showCreateForm')->name('channels.create');
Route::post('/channel', 'ChannelController@create');

//投稿確認ページ
Route::get('/channel/{post}', 'ChannelController@detail')->name('channels.detail');


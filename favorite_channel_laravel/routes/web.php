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

if (config('app.env') === 'production' or config('app.env') === 'staging') {
    // asset()やurl()がhttpsで生成される
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// チャンネル一覧表示
    Route::get('/channel', [App\Http\Controllers\ChannelController::class, 'index'])->name('channel.index');

    Auth::routes();
// ログイン時のみ可能
    Route::group(['middleware' => 'auth'], function()
    {  
        // 投稿チャンネル機能
            Route::post('/edit_confirm', [App\Http\Controllers\ChannelController::class, 'store'])->name('channel.store');
            Route::get('/channel_edit/{id}', [App\Http\Controllers\ChannelController::class, 'edit'])->name('channel.edit');
            Route::post('/channel_edit/{id}', [App\Http\Controllers\ChannelController::class, 'update'])->name('channel.update');

        // チャンネル投稿確認画面
            Route::get('/edit_confirm', [App\Http\Controllers\ChannelController::class, 'create'])->name('channel.create');
        
        // マイページ機能
            Route::get('/mypage', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
            Route::get('/mypage_edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
            Route::post('/mypage_edit', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');

        // メール送信機能
            Route::get('/mail', [MailController::class,'index']);
            Route::post('/mail', [MailController::class,'send']);
    });

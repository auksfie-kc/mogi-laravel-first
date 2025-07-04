<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
// トップページ（非会員・会員共通）
//Route::get('/', [ItemController::class, 'index']);
Route::middleware([])->group(function () {
    Route::get('/', function () {
        return 'This is a public route.';
    });
});
//メール認証のコーディング
Auth::routes(['verify' => true]);

// 認証してない人用の画面
Route::get('/email/verify', function () {
    return view('auth.verify-email'); 
})->middleware('auth')->name('verification.notice');

// メールのリンククリック時
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // ここで認証完了処理（email_verified_at更新）
    return redirect('/mypage-edit'); // 認証後に表示したい画面へ
})->middleware(['auth', 'signed'])->name('verification.verify');

// 認証済みユーザー専用ページ
Route::get('/?tab=mylist', function () {
    return view('mypage-edit'); 
})->middleware(['auth', 'verified']);

Route::view('/?tab=mylist', 'mypage-edit')->middleware('auth'); // ホーム画面の表示処理



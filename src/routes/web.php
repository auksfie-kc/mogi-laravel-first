<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use App\Http\Controllers\UserItemController;

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
Route::get('/', [ItemController::class, 'index']);

Route::middleware('auth')->group(function () {
         Route::get('/?page=mylist', [UserItemController::class, 'index']);
     });



Route::middleware(['auth','verified'])->group(function () {
    Route::get('/mypage/profile', function () {
        return view('/mypage/profile');
    });
});

//メール認証のコーディング
//Auth::routes(['verify' => true]);

//メール確認の通知を送ったよの画面表示！
Route::get('/email/verify', function () {
    return view('verify-email'); 
})->middleware('auth')->name('verification.notice');

// メールの認証リンククリック時！
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // ここで認証完了処理（email_verified_at更新）
    return redirect('mypage-edit'); // 認証後に表示したい画面へ
})->middleware(['auth', 'signed'])->name('verification.verify');

// 新規認証済みユーザー専用ページ！
Route::get('/mypage-edit', function () {
    return view('mypage-edit'); 
})->middleware(['auth', 'verified']);


//確認メールの再送信！
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
});


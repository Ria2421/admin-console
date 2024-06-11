<?php
//-------------------------------------------------
// ルート [Web.php]
// Author:Kenta Nakamoto
// Data:2024/06/11
//-------------------------------------------------

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

// ログイン画面の表示
Route::get('/', [AccountController::class, 'showLogin']);

// ログイン画面の表示
Route::get('accounts/showLogin', [AccountController::class, 'showLogin']);

// ログイン処理
Route::post('accounts/doLogin', [AccountController::class, 'doLogin']);

// ログアウト処理
Route::post('accounts/doLogout', [AccountController::class, 'doLogout']);

// アカウントの表示
Route::get('accounts/showAccount/{account_id?}', [AccountController::class, 'showAccount']);

// アイテムの表示
Route::get('accounts/showItem/{item_id?}', [AccountController::class, 'showItem']);

// 所持アイテムの表示
Route::get('accounts/showHaveItem/{player_id?}', [AccountController::class, 'showHaveItem']);

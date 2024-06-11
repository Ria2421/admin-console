<?php
//-------------------------------------------------
// アカウントコントローラー [AccountController.php]
// Author:Kenta Nakamoto
// Data:2024/06/11
//-------------------------------------------------

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    // ログイン画面を表示する
    public function showLogin(Request $request)
    {
        // ログインしてるかチェック
        if ($request->session()->exists('login')) {
            return redirect('accounts/showAccount');
        } else {
            return view('accounts/login');
        }
    }

    // ログイン処理
    public function doLogin(Request $request)
    {
        if ($request['name'] === 'jobi' && $request['password'] === 'jobi') {
            // セッションにログイン情報を登録
            $request->session()->put('login', true);

            // 一覧表示
            return redirect('accounts/showAccount');

        } else {
            // エラー表示
            $error = '入力内容に誤りがあります。';
            return view('accounts/login', ['error' => $error]);
        }
    }

    // ログアウト処理
    public function dologout(Request $request)
    {
        // 指定したデータをセッションから削除
        $request->session()->forget('login');

        // ログイン画面にリダイレクト
        return redirect('accounts/showLogin');
    }

    // アカウント一覧を表示する
    public function showAccount(Request $request)
    {
        // ログインしているかチェック
        if ($request->session()->exists('login')) {
            // ログインしている
            $data = [
                ['id' => 1, 'name' => 'jobi', 'level' => '10', 'exp' => 100, 'life' => 3],
                ['id' => 2, 'name' => 'hoge', 'level' => '22', 'exp' => 1050, 'life' => 25],
                ['id' => 3, 'name' => 'huga', 'level' => '23', 'exp' => 1120, 'life' => 33],
            ];

            return view('accounts/account', ['accounts' => $data]);
        } else {
            // ログインしてない

            // ログイン画面にリダイレクト
            return redirect('accounts/showLogin');
        }
    }

    // アイテム一覧の表示
    public function showItem(Request $request)
    {
        // ログインしているかチェック
        if ($request->session()->exists('login')) {
            // ログインしている
            $data = [
                ['id' => 1, 'name' => 'やくそう', 'type' => '1', 'effect_value' => 10, 'text' => 'HPを少し回復'],
                ['id' => 2, 'name' => '上やくそう', 'type' => '1', 'effect_value' => 25, 'text' => 'HPを回復'],
                ['id' => 3, 'name' => '特やくそう', 'type' => '1', 'effect_value' => 50, 'text' => 'HPをかなり回復'],
                ['id' => 4, 'name' => 'はねのくつ', 'type' => '2', 'effect_value' => 8, 'text' => '素早さが上がる']
            ];

            return view('accounts/item', ['items' => $data]);
        } else {
            // ログインしてない

            // ログイン画面にリダイレクト
            return redirect('accounts/showLogin');
        }
    }

    // 所持アイテム一覧の表示
    public function showHaveItem(Request $request)
    {
        // ログインしているかチェック
        if ($request->session()->exists('login')) {
            // ログインしている
            $data = [
                ['player_id' => 2, 'player_name' => 'hoge', 'item_name' => '上やくそう', 'quantity' => 10],
                ['player_id' => 3, 'player_name' => 'huga', 'item_name' => 'はねのくつ', 'quantity' => 1]
            ];

            return view('accounts/haveItem', ['haveItems' => $data]);
        } else {
            // ログインしてない

            // ログイン画面にリダイレクト
            return redirect('accounts/showLogin');
        }
    }
}

//- デバック -//
//dd関数
//dd($request->account_id);

//Laravel DebugBar
// use Barryvdh\Debugbar\Facades\Debugbar;
//Debugbar::info('あいうえお');
//Debugbar::error('えらーだよ');

/* セッションに指定のキーで値を保存
$request->session()->put('name', 'hoge');
// セッションから指定のキーの値を取得
$value = $request->session()->get('name');
// 指定したデータをセッションから削除
$request->session()->forget('name');
// セッションのデータをすべて削除
$request->session()->flush();
// セッションに指定してキーが存在するか
if ($request->session()->exists('name')) {

}
dd($value);*/

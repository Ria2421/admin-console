<!--------------------------------------------
// 所持アイテム一覧画面 [haveItem.blade.php]
// Author:Kenta Nakamoto
// Data:2024/06/11
//-------------------------------------------->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="?action=playerList" class="nav-link px-2">Players</a></li>
            <li><a href="?action=itemList" class="nav-link px-2">Items</a></li>
            <li><a href="?action=playerItem" class="nav-link px-2 link-secondary">Player Items</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <form method="POST" action="{{url('accounts/doLogout')}}">
                @csrf
                <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
                <input type="hidden" name="action" value="doLogout">
            </form>
        </div>

    </header>
</div>

<div class="container text-center bg-primary-subtle" style="width: 500px">
    <h3 class="display-5">▼ 所持アイテム一覧 ▼</h3>
</div>

<!--検索-->
<div class="text-center">
    <form method="POST" action="index.php">
        <input type="text" name="id" placeholder="IDを入力">
        <input type="submit" value="検索">
        <input type="hidden" name="action" value="searchPlayerItem">
    </form>
</div>

<table class="table table-bordered mx-auto p-2" style="width: 60%">
    <tr>
        <th>プレイヤーID</th>
        <th>プレイヤー名</th>
        <th>アイテム名</th>
        <th>所持個数</th>
    </tr>

    <?php
    if (!empty($playerItems)) {    // コントローラーから渡された$usersを使って表示
        foreach ($playerItems as $playerItem) {
            echo '<tr>';    // trタグの開始

            echo '<td>' . $playerItem['id'] . '</td>';                      // ID
            echo '<td>' . escapeHtml($playerItem['player_name']) . '</td>'; // プレイヤー名
            echo '<td>' . $playerItem['item_name'] . '</td>';               // アイテム名
            echo '<td>' . $playerItem['quantity'] . '</td>';                // 所持数

            echo '</tr>';   // タグ閉じ
        }
    } else {
        echo '<div class="text-center">該当する検索結果はありませんでした。</div>';
    }

    // 文字列を無害化し、スクリプト等を弾くようにする関数 (XSS攻撃を防ぐ)
    function escapeHtml($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

    ?>

</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>
</html>

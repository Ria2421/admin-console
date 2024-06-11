<!--------------------------------------------
// アカウント一覧画面 [account.blade.php]
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

<!-- ヘッダー -->
<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="showAccount" class="nav-link px-2 link-secondary">Accounts</a></li>
            <li><a href="showItem" class="nav-link px-2">Items</a></li>
            <li><a href="showHaveItem" class="nav-link px-2">Player Items</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <form method="POST" action="{{url('accounts/doLogout')}}">
                @csrf
                <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
            </form>
        </div>

    </header>
</div>

<!-- 表示内容 -->
<div class="container text-center bg-primary-subtle" style="width: 500px">
    <h3 class="display-5">▼ アカウントー一覧 ▼</h3>
</div>

<!--検索
<div class="text-center">
    <form method="POST" action="index.php">
        <input type="text" name="name" placeholder="名前を入力">
        <input type="submit" value="検索">
        <input type="hidden" name="action" value="searchPlayer">
    </form>
</div>
-->

<br>

<table class="table table-bordered mx-auto p-2" style="width: 60%">
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>レベル</th>
        <th>経験値</th>
        <th>ライフ</th>
    </tr>

    @foreach($accounts as $account)
        <tr>
            <td>{{$account['id']}}</td>
            <td>{{$account['name']}}</td>
            <td>{{$account['level']}}</td>
            <td>{{$account['exp']}}</td>
            <td>{{$account['life']}}</td>
        </tr>
    @endforeach


</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>
</html>

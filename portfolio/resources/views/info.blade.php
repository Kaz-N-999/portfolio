<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
    <title>旅行写真記録アプリ</title>
    <script src="js\jquery-3.6.1.min.js"></script>
    <script src="js\jquery.japan-map.js"></script>
    <script src="js\jquery.japan-map.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script>
        var prefecture
        $(function() {
            $("#map-container").japanMap({
                onSelect: function(data) {
                    prefecture = data.name;
                    target = document.getElementById("output");
                    target.innerHTML = data.name;
                }
            });
        });
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/info">旅行写真記録アプリ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/info">登録画面</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/map">Google MAP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/list">履歴閲覧</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">CONTACT</a>
              </li>
              <li class="nav-item">
                <form method="post" name='logout' action="logout" >
                  @csrf
                  <input type="hidden">
                  <a href="javascript:logout.submit()" class="nav-link">ログアウト</a>
                </form>
              </li>
          </div>
        </div>
      </nav>

    @if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div id="map-container"></div>
    <h1 id="output"></h1>

    <form name="myform" method="POST" action="/create" enctype="multipart/form-data">
        @csrf

        <label>市町村:<input type="text" name="city" required></label><br>
        <label>コメント:<input type="text" class="txt" name="comment" required></label>

        <input type="file" name="img" accept="image/*">

        <input type="submit" value="送信" onclick="funcBtn()">
    </form>
    <script>
        function funcBtn() {
    // エレメントを作成
    var ele = document.createElement('input');
    // データを設定
    ele.setAttribute('type', 'hidden');
    ele.setAttribute('name', 'prefecture');
    ele.setAttribute('value', prefecture);
    // 要素を追加
    document.myform.appendChild(ele);
}
    </script>
    <footer class="bg-dark text-center">
        <div class="container">
            <p class="my-0 text-white py-3">&copy;Trip report</p>
        </div>
    </footer>
</body>

</html>
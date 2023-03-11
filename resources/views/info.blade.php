<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
  <title>旅行写真記録アプリ</title>
  <!--<script src="js\jquery-3.6.1.min.js"></script>
  <script src="js\jquery.japan-map.js"></script>
  <script src="js\jquery.japan-map.min.js"></script>
  <script src="js\jquery.form.js"></script>-->

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/newmap.js"></script>


  <link rel="stylesheet" href="/info.css">

  <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script type = "text/javascript">
    /*var prefecture
        $(function() {
            $("#map-container").japanMap({
                onSelect: function(data) {
                    prefecture = data.name;
                    target = document.getElementById("output");
                    target.innerHTML = data.name;
                }
            });
        });*/

        //newmap
        $(document).ready(function() {
          $('#jmap').jmap({
    height: "450px",
    skew: '10',
    showHeatmap: true,
    heatmapLabelUnit: '人',
    heatmapType: 'HRed',
    showHeatlabel: true,
    onSelect: function(e, data) {
        alert('人口は：%d 人です。'.replace('%d', (data.option.number * 1000).toLocaleString()));
    },
    areas: [
    {code: 1,name: "北海道",number: 5320},
    {code: 2,name: "青森",number: 1278},
    {code: 3,name: "岩手",number: 1255},
    {code: 4,name: "宮城",number: 2323},
    {code: 5,name: "秋田",number: 996},
    {code: 6,name: "山形",number: 1102},
    {code: 7,name: "福島",number: 1882},
    {code: 8,name: "茨城",number: 2892},
    {code: 9,name: "栃木",number: 1957},
    {code: 10,name: "群馬",number: 1960},
    {code: 11,name: "埼玉",number: 7310},
    {code: 12,name: "千葉",number: 6246},
    {code: 13,name: "東京",number: 13724},
    {code: 14,name: "神奈川",number: 9159},
    {code: 15,name: "新潟",number: 2267},
    {code: 16,name: "富山",number: 1056},
    {code: 17,name: "石川",number: 1147},
    {code: 18,name: "福井",number: 779},
    {code: 19,name: "山梨",number: 823},
    {code: 20,name: "長野",number: 2076},
    {code: 21,name: "岐阜",number: 2008},
    {code: 22,name: "静岡",number: 3675},
    {code: 23,name: "愛知",number: 7525},
    {code: 24,name: "三重",number: 1800},
    {code: 25,name: "滋賀",number: 1413},
    {code: 26,name: "京都",number: 2599},
    {code: 27,name: "大阪",number: 8823},
    {code: 28,name: "兵庫",number: 5503},
    {code: 29,name: "奈良",number: 1348},
    {code: 30,name: "和歌山",number: 945},
    {code: 31,name: "鳥取",number: 565},
    {code: 32,name: "島根",number: 685},
    {code: 33,name: "岡山",number: 1907},
    {code: 34,name: "広島",number: 2829},
    {code: 35,name: "山口",number: 1383},
    {code: 36,name: "徳島",number: 743},
    {code: 37,name: "香川",number: 967},
    {code: 38,name: "愛媛",number: 1364},
    {code: 39,name: "高知",number: 714},
    {code: 40,name: "福岡",number: 5107},
    {code: 41,name: "佐賀",number: 824},
    {code: 42,name: "長崎",number: 1354},
    {code: 43,name: "熊本",number: 1765},
    {code: 44,name: "大分",number: 1152},
    {code: 45,name: "宮崎",number: 1089},
    {code: 46,name: "鹿児島",number: 1626},
    {code: 47,name: "沖縄",number: 1443}
    ]
});
        });
  </script>
</head>

<body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/info">旅行写真記録アプリ</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
        aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
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
            <form method="post" name='logout' action="logout">
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
  <article>
    <!--<div id="map-container"></div>-->

    <div id="jmap"></div>

    <div class="side">
      <h1 id="output">
        <font color="green">都道府県を選択してね</font>
      </h1>
      

      <form name="myform" method="POST" action="/create" enctype="multipart/form-data">
        @csrf
        <select type="text" class="form-control" name="prefecture">                          
          @foreach(config('pref') as $key => $score)
              <option value="{{ $score }}">{{ $score }}</option>
          @endforeach
        </select>

        <label id="img">写真:<input type="file" name="img"></label><br>

        <!-- 写真のサムネイルを表示するプラグイン-->
        <script src="js\thumbnail.js"></script>
        <div id="photo_view"></div>

        <label id="city">場所の詳細:<input type="text" name="city" value="{{ old('city') }}" required></label><br>
        <label id="comment">一言コメント:（191文字以内）<br><textarea type="text" class="txt" name="comment"
            value="{{ old('comment') }}" required></textarea></label><br>

        <input type="submit" value="登録" id="input" class="btn btn-success" onclick="funcBtn()">
      </form>
      <!--
        旧データ挿入コード
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
      </script>-->
    </div>
  </article>

  <footer class="bg-dark text-center">
    <div class="container">
      <p class="my-0 text-white py-3">&copy;Trip report</p>
    </div>
  </footer>
</body>

</html>
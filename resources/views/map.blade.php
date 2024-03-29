<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Google Map</title>
  <link rel="stylesheet" href="/info.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <a class="nav-link" aria-current="page" href="/info">登録画面</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/map">Google MAP</a>
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

  <!-- 座標の値を取得し、Javascriptに渡す-->
  <script>
    var lat = [];
    var lng = [];
    var marker = [];
    var markerData = [];
    var count = 0;
  </script>
  @foreach ($markers as $marker)
    <script>
      //文字列型をfloat型に変換
      {{$f_lat = (float) $marker->lat;}}
      {{$f_lng = (float) $marker->lng;}}
      //配列にjavascriptの値として格納
        lat[count] = @json($f_lat);
        lng[count] = @json($f_lng);
//    カウンター
      count ++;
//    console.log(count);
    </script>
  @endforeach

  <div id="map" style="height:470px">
  </div>
  <script type="text/javascript">
    function initMap() {

      // マップの初期化
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: {lat: 35.681236, lng: 139.767125}
      });

      // クリックイベントを追加
      map.addListener('click', function(e){
          // データをセット
          document.getElementById( "setlat" ).value = e.latLng.lat().toString();
          document.getElementById( "setlng" ).value = e.latLng.lng().toString();

      });

      for(let i=0; i < lat.length; i++){
//      var latNum = parseFloat(lat[i]);
//      var lngNum = parseFloat(lng[i]);
        // マーカー位置セット
        markerLatLng = new google.maps.LatLng({lat: lat[i], lng: lng[i]}); // 緯度経度のデータ作成
         // マーカーのセット
        marker[i] = new google.maps.Marker({
            position: markerLatLng,          // 位置を指定
            map: map,                        // 地図を指定
          });
      }
//  marker.addListener('click', function(){
//      this.setMap(null);
//    });
      
    }
  </script>
<div class="form">
  <form name="markerform" method="POST" action="/marker">

    @csrf
    <label>緯度<input type="text" id="setlat" name="lat" readonly></label>
    <label>経度<input type="text" id="setlng" name="lng" readonly></label>
    <input class="btn btn-primary" type="submit" value="マーカーを保存する">

  </form>
  <button ondblclick="location.href='/delete_markers'" class="d_m_button btn btn-danger">全てのマーカーを削除(ダブルクリック)</button>
</div>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config("services.google-map.apikey")}}&callback=initMap"></script>

  <footer class="bg-dark text-center">
    <div class="container">
      <p class="my-0 text-white py-3">&copy;Trip report</p>
    </div>
  </footer>
</body>

</html>
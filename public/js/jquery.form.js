// 都道府県フォーム生成
$(function () {
    $.getJSON("pref_city.json", function (data) {
        for (var i = 1; i < 48; i++) {
            var code = ("00" + code).slice(-2); // ゼロパディング
            $("#select-pref").append("" + data[i - 1][code].pref + "");
        }
    });
});

// 都道府県メニューに連動した市区町村フォーム生成
$("#select-pref").on("change", function () {
    $("#select-city option:nth-child(n+2)").remove(); // 市区町村フォームクリア
    var select_pref = ("00" + $("#select-pref option:selected").val()).slice(
        -2
    );
    var key = Number(select_pref) - 1;
    $.getJSON("pref_city.json", function (data) {
        for (var i = 0; i < data[key][select_pref].city.length; i++) {
            $("#select-city").append(
                "" + data[key][select_pref].city[i].name + ""
            );
        }
    });
});

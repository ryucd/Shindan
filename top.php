<?
session_start();
include "setting.php";

if(!isset($_SESSION['id']) || !isset($_SESSION['ipaddress'])){
	gotoindex();
}

check_login();

$_GET['pagename'] = 'top';
include "header.php";

print <<< EOF
<article>
<h2>性別の推移</h2>
EOF;

$result = getGraphData();
$num = pg_num_rows($result);
$sex = getMySex();
if($num == 0){
	print "まだ診断を行っていません。<br>";
} else {
	if($sex === "女"){
		print "100が最も女性らしく、-100が最も男性らしくなります。<br>";
	}else {
		print "100が最も男性らしく、-100が最も女性らしくなります。<br>";
	}
	print '<canvas id="chart1" width="400" height="400"></canvas>';
}

print "</article>";
print '<script src="assets/js/Chart.js"></script>';

include "footer.php";

print <<< EOF

<script>
//jQueryの場合
var ctx = $("#chart1").get(0).getContext("2d");
var data = {
  //X軸のラベル
  labels : [
EOF;

for($i = 0; $i < $num; $i++){
	$row = pg_fetch_assoc($result, $i);
	if($i != 0) print ",";
	print "\"".date("Y-m-d", strtotime($row['date']))."\"";
}
//"January","February","March","April","May","June","July"],
print <<< EOF
],
	datasets : [
    {
      //1つ目のグラフの描画設定
      fillColor : "rgba(220,220,220,0.5)",//面の色・透明度
      strokeColor : "rgba(220,220,220,1)",//線の色・透明度
      pointColor : "rgba(220,220,220,1)", //点の色・透明度
      pointStrokeColor : "#fff",//点の周りの色
	data : [
EOF;
$coeff = 1;
if($sex === "女") $coeff = -1;
for($i = 0; $i < $num; $i++){
	$row = pg_fetch_assoc($result, $i);
		if($i != 0) print ",";
		print $coeff*round($row['sex'],2);
}
//65,59,90,81,56,55,40]//labelごとのデータ
print <<< EOF
	]
	}
  ]
}
var option = {
  //Boolean - 縦軸の目盛りの上書き許可
  scaleOverride : true,
  //** ↑がtrueの場合 **
  //Number - 目盛りの間隔
  scaleSteps : 6,
  //Number - 目盛り区切りの間隔
  scaleStepWidth : 10,
  //Number - 目盛りの最小値
  scaleStartValue : 100,
  //String - 目盛りの線の色 
  scaleLineColor : "rgba(0,0,0,.1)",
  //Number - 目盛りの線の幅  
  scaleLineWidth : 10,
  //Boolean - 目盛りを表示するかどうか  
  scaleShowLabels : true,
  //String - 目盛りのフォント
  scaleFontFamily : "'Arial'",
  //Number - 目盛りのフォントサイズ 
  scaleFontSize : 10,
  //String - 目盛りのフォントスタイル bold→太字  
  scaleFontStyle : "normal",
  //String - 目盛りのフォント 
  scaleFontColor : "#666",  
  ///Boolean - チャートの背景にグリッドを描画するか
  scaleShowGridLines : true,
  //String - チャート背景のグリッド色
  scaleGridLineColor : "rgba(0,0,0,.05)",
  //Number - チャート背景のグリッドの太さ
  scaleGridLineWidth : 1,  
  //Boolean - 線を曲線にするかどうか。falseで折れ線になる
  bezierCurve : true,
  //Boolean - 点を描画するか
  pointDot : true,
  //Number - 点の大きさ
  pointDotRadius : 3,
  //Number - 点の周りの大きさ
  pointDotStrokeWidth : 1,
  //Number - 線の太さ
  datasetStrokeWidth : 2,
  //Boolean - アニメーションの有無
  animation : false,
  //Number - アニメーションの早さ(大きいほど遅い)
//  animationSteps : 60,
  //Function - アニメーション終了時の処理
//  onAnimationComplete : null
}
//グラフを描画する
//var myNewChart = new Chart(ctx).Line(data,option);
//optionは無くても描画可能

EOF;

if($num > 0){
 print "var myNewChart = new Chart(ctx).Line(data);";
}
print "</script>";

function getMySex()
{
	$db = new mydb();
	$query = "select sex from member where id=$1";
	$result = $db->query($query, array($_SESSION['id']), "getMySex");
	if(pg_num_rows($result) == 0) return "";
	$row = pg_fetch_assoc($result, 0);
	return $row['sex'];
}

function getGraphData()
{
	$db = new mydb();
	$query = "select * from log where m_id = $1";
	$result = $db->query($query, array($_SESSION['id']), "getGraphData");
	return $result;
}

?>

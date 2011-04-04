<?php
# EUC CRLF

	// 内部文字コードを出力文字コードに変換するライブラリ
	require_once 'output_encode.php';

	// キャリア, 機種を判別するライブラリ
	require_once 'mobile_useragent_carrier.php';

	// キャリア, 機種, タイプを判別する。
	//list($carrier, $model, $type) = mobile_useragent_carrier();
	$mobile_data = mobile_useragent_carrier();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift-JIS'" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<title>キャリア/機種判別(Chap3)</title>
</head>
<body>
キャリア/機種判別(Chap3)<br />
<hr>

アクセスしている携帯電話は<br />

▼キャリア<br>
<!-- <?php echo $carrier; ?><br /> -->
<?php echo $mobile_data['carrier']; ?><br />


▼機種名<br>
<!-- <?php echo $model; ?><br /> -->
<?php echo $mobile_data['model']; ?><br />

▼ブラウザタイプ<br>
<!-- <?php echo $type; ?><br /> -->
<?php echo $mobile_data['type']; ?><br />
<br />

ここから下はデバッグ情報。<br />
携帯からサーバにアクセスすると、<br />
以下のような情報をサーバ側は取得できる<br />
だから、ワンクリック詐欺みたいな脅しが可能。<br />

<br />
<pre>
<?php print_r($_SERVER); ?>
</pre>
</body>
</html>

<?php 
//内部文字コードを出力文字コードに変換する
output_encode();

?>
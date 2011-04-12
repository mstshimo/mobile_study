<?php
# EUC CRLF

require_once 'emoji_input_softbank_utf8.php';
require_once 'input_encode.php';

$output = '';

if(isset($_POST['data'])){
	$_POST['data'] = emoji_text_input($_POST['data']);
}

input_encode();

if(isset($_POST['data'])){
	$output = htmlspecialchars($_POST['data']);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='UTF-8'" />
<title>絵文字入力UTF-8(softbank)</title>
</head>
<body>
<h4><body>3GC型はUTF-8に対応しているから、UTF-8で書くと良い</h4>

■softbank絵文字入力<br />
<form action="./emoji_input_softbank_utf8_view.php" method="POST">
<input type="text" name="data" value=""><br />
<input type="submit" value="送信"><br />
</form>
<br />

■文字コード<br />
<?php echo $test; ?><br />

■内部絵文字の結果<br />
<?php echo $output; ?><br />

</body>
</html>

<?php
// 内部文字コードを出力文字コードへ変換する
require_once 'output_encode.php';
output_encode();
?>
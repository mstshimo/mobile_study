<?php
require_once 'emoji_input_docomo.php';
require_once '../chap2/input_encode.php';

$output;

if(isset($_POST['data'])){
	$_POST['data'] = emoji_text_input($_POST['data']);
}

if(isset($_POST['data_patch'])){
	$_POST['data_patch'] = emoji_text_input_patch($_POST['data_patch']);
}

input_encode();

$output = htmlspecialchars($_POST['data']);

$output_patch = htmlspecialchars($_POST['data_patch']);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift_JIS'" />
<title>絵文字入力(docomo)</title>
</head>
<body>
<h4>絵文字を、内部的に管理している、&lt;emoji=番号,,,&gt; に変換する。</h4>
画面下に結果が出ます。<br />

■docomo絵文字入力<br />
飲食店 &#xE63E; と入力すると、飲食店が化ける。<br />
88F99048で、F990が晴れなので文字を壊している。<br />
<form action="./emoji_input_docomo_view.php" method="POST">
<input type="text" name="data" value=""><br />
<input type="submit" value="送信"><br />
</form>
<br />

上記の不具合を解消したバージョン<br />
飲食店 &#xE63E; と入力する。<br />
■docomo絵文字入力<br />
<form action="./emoji_input_docomo_view.php" method="POST">
<input type="text" name="data_patch" value=""><br />
<input type="submit" value="送信"><br />
</form>
<br />

■内部絵文字の結果<br />
<?php echo $output ?><br />
<?php echo $output_patch ?><br />
</body>
</html>

<?php
require_once 'output_encode.php';

output_encode();

?>
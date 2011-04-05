<?php
require_once 'emoji_input_au.php';
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
<title>絵文字入力(au)</title>
</head>
<body>
<h4>絵文字を、内部的に管理している、&lt;emoji=,au番号,,&gt; に変換する。</h4>
画面下に結果が出ます。<br /><br />

■au絵文字入力<br />
恋をした &#xE488; と入力すると、化ける。<br />
97F6 82F0 82B5 82BD で、F682で文字を壊している。<br />
<form action="./emoji_input_au_view.php" method="POST">
<input type="text" name="data" value=""><br />
<input type="submit" value="送信"><br />
</form>
<br />

上記の不具合を解消したバージョン<br />
■au絵文字入力<br />
<form action="./emoji_input_au_view.php" method="POST">
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
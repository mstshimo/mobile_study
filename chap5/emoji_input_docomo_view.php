<?php
require_once 'emoji_input_docomo.php';
require_once '../chap2/input_encode.php';

$output;

if(isset($_POST['data'])){
	$_POST['data'] = emoji_text_input($_POST['data']);
}

input_encode();

$output = htmlspecialchars($_POST['data']);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift_JIS'" />
<title>絵文字入力(docomo)</title>
</head>
<body>
■docomo絵文字入力<br />
<form action="./emoji_input_docomo_view.php" method="POST">
<input type="text" name="data" value=""><br />
<input type="submit" value="送信"><br />
</form>
<br />

■内部絵文字の結果<br />
<?php echo $output ?><br />
</body>
</html>

<?php
require_once 'output_encode.php';

output_encode();

?>
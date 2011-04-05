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
<title>ｳｨﾊｸｻ憘ﾎﾏ(docomo)</title>
</head>
<body>
｢｣docomoｳｨﾊｸｻ憘ﾎﾏ<br />
<form action="./emoji_input_docomo_view.php" method="POST">
<input type="text" name="data" value=""><br />
<input type="submit" value="ﾁｮ"><br />
</form>
<br />

｢｣ﾆ篷ｨﾊｸｻ妤ﾎｷ�ｲﾌ<br />
<?php echo $output ?><br />
</body>
</html>

<?php
require_once 'output_encode.php';

output_encode();

?>
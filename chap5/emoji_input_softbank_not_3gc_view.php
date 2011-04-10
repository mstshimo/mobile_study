<?php
//ini_set('display_errors','On');
//error_reporting(E_ALL);

require_once 'emoji_input_softbank_not_3gc.php';
require_once '../chap2/input_encode.php';

$output = '';

if(isset($_POST['data'])){
	$_POST['data'] = emoji_text_input($_POST['data']);

}

input_encode();

$output = htmlspecialchars($_POST['data']);



?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift_JIS'" />
<title>絵文字入力(softbank)</title>
</head>
<body>
<h4>絵文字を、内部的に管理している、&lt;emoji=,,softbank番号,&gt; に変換する。</h4>
画面下に結果が出ます。<br /><br />

softbankは絵文字の表現に5byte使っている。<br />
他のキャリアとは異なり、扱いが面倒<br />
■softbank絵文字入力<br />
<form action="./emoji_input_softbank_not_3gc_view.php" method="POST">
<input type="text" name="data" value=""><br />
<input type="submit" value="送信"><br />
</form>
<br />

■内部絵文字の結果<br />
<?php echo $output; ?><br />
</body>
</html>

<?php
require_once 'output_encode.php';
output_encode();
?>
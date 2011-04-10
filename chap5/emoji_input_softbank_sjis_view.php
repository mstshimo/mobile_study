<?php
//ini_set('display_errors','On');
//error_reporting(E_ALL);

require_once 'emoji_input_softbank_sjis.php';
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
<title>絵文字入力(softbank3GC型)</title>
</head>
<body>
<h4>絵文字を、内部的に管理している、&lt;emoji=,,softbank番号,&gt; に変換する。</h4>
画面下に結果が出ます。<br /><br />

3GC型の端末は、文字コードの扱いが、3GC型以外と異なる。<br />
■softbank絵文字入力(softbank3GC型)<br />
<form action="./emoji_input_softbank_sjis_view.php" method="POST">
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
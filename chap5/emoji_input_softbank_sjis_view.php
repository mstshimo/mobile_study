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
<title>��ʸ������(softbank3GC��)</title>
</head>
<body>
<h4>��ʸ��������Ū�˴������Ƥ��롢&lt;emoji=,,softbank�ֹ�,&gt; ���Ѵ����롣</h4>
���̲��˷�̤��Фޤ���<br /><br />

3GC����ü���ϡ�ʸ�������ɤΰ�������3GC���ʳ��Ȱۤʤ롣<br />
��softbank��ʸ������(softbank3GC��)<br />
<form action="./emoji_input_softbank_sjis_view.php" method="POST">
<input type="text" name="data" value=""><br />
<input type="submit" value="����"><br />
</form>
<br />

��������ʸ���η��<br />
<?php echo $output; ?><br />
</body>
</html>

<?php
require_once 'output_encode.php';
output_encode();
?>
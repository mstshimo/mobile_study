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
<title>��ʸ������(softbank)</title>
</head>
<body>
<h4>��ʸ��������Ū�˴������Ƥ��롢&lt;emoji=,,softbank�ֹ�,&gt; ���Ѵ����롣</h4>
���̲��˷�̤��Фޤ���<br /><br />

softbank�ϳ�ʸ����ɽ����5byte�ȤäƤ��롣<br />
¾�Υ���ꥢ�Ȥϰۤʤꡢ����������<br />
��softbank��ʸ������<br />
<form action="./emoji_input_softbank_not_3gc_view.php" method="POST">
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
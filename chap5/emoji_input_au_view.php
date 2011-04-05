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
<title>��ʸ������(au)</title>
</head>
<body>
<h4>��ʸ��������Ū�˴������Ƥ��롢&lt;emoji=,au�ֹ�,,&gt; ���Ѵ����롣</h4>
���̲��˷�̤��Фޤ���<br /><br />

��au��ʸ������<br />
���򤷤� &#xE488; �����Ϥ���ȡ������롣<br />
97F6 82F0 82B5 82BD �ǡ�F682��ʸ��������Ƥ��롣<br />
<form action="./emoji_input_au_view.php" method="POST">
<input type="text" name="data" value=""><br />
<input type="submit" value="����"><br />
</form>
<br />

�嵭���Զ����ä����С������<br />
��au��ʸ������<br />
<form action="./emoji_input_au_view.php" method="POST">
<input type="text" name="data_patch" value=""><br />
<input type="submit" value="����"><br />
</form>
<br />

��������ʸ���η��<br />
<?php echo $output ?><br />
<?php echo $output_patch ?><br />
</body>
</html>

<?php
require_once 'output_encode.php';

output_encode();

?>
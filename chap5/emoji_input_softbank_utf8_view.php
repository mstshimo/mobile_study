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
<title>��ʸ������UTF-8(softbank)</title>
</head>
<body>
<h4><body>3GC����UTF-8���б����Ƥ��뤫�顢UTF-8�ǽ񤯤��ɤ�</h4>

��softbank��ʸ������<br />
<form action="./emoji_input_softbank_utf8_view.php" method="POST">
<input type="text" name="data" value=""><br />
<input type="submit" value="����"><br />
</form>
<br />

��ʸ��������<br />
<?php echo $test; ?><br />

��������ʸ���η��<br />
<?php echo $output; ?><br />

</body>
</html>

<?php
// ����ʸ�������ɤ����ʸ�������ɤ��Ѵ�����
require_once 'output_encode.php';
output_encode();
?>
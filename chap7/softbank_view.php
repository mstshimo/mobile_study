<?php
require_once 'Net/UserAgent/Mobile.php';
$agent = Net_UserAgent_Mobile::factory();

?>
<html>
<head>
<meta http-equiv="Content=type" content="text/html; charset='Shift_JIS'" />
<title>SoftBank���μ��̾�������ڡ���</title>
</head>
<body>
��SoftBank���μ��̾�������ڡ���<br />
2008ǯ7���W���Ϥʤ��ʤäƤ��롣<br />
ü�����ꥢ���ֹ��(P����11�塢W����15�塢3GC����15��αѿ���)<br />

<?php
	echo $agent->getSerialNumber();

#	print_r($_SERVER);
?>
<br />

�桼��ID��(16��αѿ���)<br />
<?php
	echo $_SERVER['HTTP_X_JPHONE_UID'];
?>


</body>
</html>

<?php
require_once '../chap2/output_encode.php';
output_encode();
?>

<?php
require_once 'Net/UserAgent/Mobile.php';
$agent = Net_UserAgent_Mobile::factory();

?>
<html>
<head>
<meta http-equiv="Content=type" content="text/html; charset='Shift_JIS'" />
<title>SoftBank個体識別情報取得ページ</title>
</head>
<body>
■SoftBank個体識別情報取得ページ<br />
2008年7月からW型はなくなっている。<br />
端末シリアル番号は(P型は11桁、W型は15桁、3GC型は15桁の英数字)<br />

<?php
	echo $agent->getSerialNumber();

#	print_r($_SERVER);
?>
<br />

ユーザIDは(16桁の英数字)<br />
<?php
	echo $_SERVER['HTTP_X_JPHONE_UID'];
?>


</body>
</html>

<?php
require_once '../chap2/output_encode.php';
output_encode();
?>

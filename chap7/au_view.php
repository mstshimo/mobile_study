<?php
$mobile_id = $_SERVER['HTTP_X_UP_SUBNO']

?>
<html>
<head>
<meta http-equiv="Content=type" content="text/html; charset='Shift_JIS'" />
<title>au���μ��̾�������ڡ���</title>
</head>
<body>
��au���μ��̾�������ڡ���<br />
���ʤ���EZ�ֹ�(���֥����饤��ID)��<br />
<?php echo $mobile_id; ?>
</body>
</html>

<?php
require_once '../chap2/output_encode.php';
output_encode();
?>

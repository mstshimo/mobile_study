<?php
$mobile_id = $_SERVER['HTTP_X_UP_SUBNO']

?>
<html>
<head>
<meta http-equiv="Content=type" content="text/html; charset='Shift_JIS'" />
<title>auｸﾄﾂﾎｼｱﾊﾌｾ霹ﾀ･ﾚ｡ｼ･ｸ</title>
</head>
<body>
｢｣auｸﾄﾂﾎｼｱﾊﾌｾ霹ﾀ･ﾚ｡ｼ･ｸ<br />
､｢､ﾊ､ｿ､ﾎEZﾈﾖｹ�(･ｵ･ﾖ･ｹ･ｯ･鬣､･ﾐID)､ﾏ<br />
<?php echo $mobile_id; ?>
</body>
</html>

<?php
require_once '../chap2/output_encode.php';
output_encode();
?>

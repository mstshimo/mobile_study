<?php
$mobile_id = $_SERVER['HTTP_X_UP_SUBNO']

?>
<html>
<head>
<meta http-equiv="Content=type" content="text/html; charset='Shift_JIS'" />
<title>au個体識別情報取得ページ</title>
</head>
<body>
■au個体識別情報取得ページ<br />
あなたのEZ番号(サブスクライバID)は<br />
<?php echo $mobile_id; ?>
</body>
</html>

<?php
require_once '../chap2/output_encode.php';
output_encode();
?>

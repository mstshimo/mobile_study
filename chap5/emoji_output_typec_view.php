<?php
require_once 'emoji_output_typec.php';
require_once 'output_encode.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift_JIS'" />
<title>絵文字出力TypeC</title>
</head>
<body>
こんにちは！
<?php echo emoji_output('&#xE63E;'); ?>
</body>
</html>

<?php
output_encode();
?>
<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift_JIS'" />
<title>��ʸ��ɽ��TypeE</title>
</head>
<body>
����ˤ���!<emoji=1><emoji=2>

</body>
</html>

<?php
require_once 'output_encode.php';
require_once 'emoji_output_typee.php';

output_encode();
emoji_output();
?>
<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift_JIS'" />
<title>��ʸ��ɽ��TypeF</title>
</head>
<body>
����ˤ���! <emoji=1,2,3>

</body>
</html>

<?php
require_once 'output_encode.php';
require_once 'emoji_output_typef.php';

output_encode();
emoji_output();
?>
<?php
//ini_set('display_errors','On');
//error_reporting(E_ALL);

require_once 'Net/UserAgent/Mobile.php';

$output_encode = 'Shift_JIS';


$agent = Net_UserAgent_Mobile::factory();
if($agent->isSoftBank()){
	if($agent->isType3GC()){
		$output_encode = 'UTF-8';
	}
}


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='<?php echo $output_encode; ?>'" />
<title>���ϥ������Ѵ�</title>
</head>
<body>
<h4>�����߽������ʸ��������</h4>

<?php echo $output_encode; ?>

</body>
</html>

<?php
require_once 'output_encode.php';
output_encode();
?>
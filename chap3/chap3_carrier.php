<?php
# EUC CRLF

	// ����ʸ�������ɤ����ʸ�������ɤ��Ѵ�����饤�֥��
	require_once 'output_encode.php';

	// ����ꥢ, �����Ƚ�̤���饤�֥��
	require_once 'mobile_useragent_carrier.php';

	// ����ꥢ, ����, �����פ�Ƚ�̤��롣
	//list($carrier, $model, $type) = mobile_useragent_carrier();
	$mobile_data = mobile_useragent_carrier();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift-JIS'" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<title>����ꥢ/����Ƚ��(Chap3)</title>
</head>
<body>
����ꥢ/����Ƚ��(Chap3)<br />
<hr>

�����������Ƥ���������ä�<br />

������ꥢ<br>
<!-- <?php echo $carrier; ?><br /> -->
<?php echo $mobile_data['carrier']; ?><br />


������̾<br>
<!-- <?php echo $model; ?><br /> -->
<?php echo $mobile_data['model']; ?><br />

���֥饦��������<br>
<!-- <?php echo $type; ?><br /> -->
<?php echo $mobile_data['type']; ?><br />
<br />

�������鲼�ϥǥХå�����<br />
���Ӥ��饵���Ф˥�����������ȡ�<br />
�ʲ��Τ褦�ʾ���򥵡���¦�ϼ����Ǥ���<br />
�����顢��󥯥�å������ߤ����ʶ�������ǽ��<br />

<br />
<pre>
<?php print_r($_SERVER); ?>
</pre>
</body>
</html>

<?php 
//����ʸ�������ɤ����ʸ�������ɤ��Ѵ�����
output_encode();

?>
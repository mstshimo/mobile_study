<?php
# EUC CRLF
error_reporting(E_ALL);
ini_set('display_errors', '1');


require 'Net/IPv4.php';

/**
 * 
 * 
 * 
 */
function mobile_ip_carrier(){
	
	$ip_table = array();
	
	// docomo
	// http://www.nttdocomo.co.jp/service/imode/make/content/ip/#ip
	$ip_table['docomo'] = array();
	$ip_table['docomo'][] = '210.153.84.0/24';
	$ip_table['docomo'][] = '210.136.161.0/24';
	$ip_table['docomo'][] = '210.153.86.0/24';
	$ip_table['docomo'][] = '124.146.174.0/24';
	$ip_table['docomo'][] = '124.146.175.0/24';
	$ip_table['docomo'][] = '202.229.176.0/24';
	$ip_table['docomo'][] = '202.229.177.0/24';
	$ip_table['docomo'][] = '202.229.177.0/24';
	$ip_table['docomo'][] = '202.229.178.0/24';

	// 2011年7月1日以降 追加予定
	$ip_table['docomo'][] = '202.229.179.0/24'; 
	$ip_table['docomo'][] = '111.89.188.0/24';
	$ip_table['docomo'][] = '111.89.189.0/24';
	$ip_table['docomo'][] = '111.89.190.0/24';
	$ip_table['docomo'][] = '111.89.191.0/24';

	//フルブラウザ
	$ip_table['docomo'][] = '210.153.87.0/24';

	// au
	// http://www.au.kddi.com/ezfactory/tec/spec/ezsava_ip.html
	$ip_table['au'] = array();
	$ip_table['au'][] = '210.230.128.224/28';
	$ip_table['au'][] = '121.111.227.160/27';
	$ip_table['au'][] = '61.117.1.0/28';
	$ip_table['au'][] = '219.108.158.0/27';
	$ip_table['au'][] = '219.125.146.0/28';
	$ip_table['au'][] = '61.117.2.32/29';
	$ip_table['au'][] = '61.117.2.40/29';
	$ip_table['au'][] = '219.108.158.40/29';
	$ip_table['au'][] = '219.125.148.0/25';
	$ip_table['au'][] = '222.5.63.0/25';
	$ip_table['au'][] = '222.5.63.128/25';
	$ip_table['au'][] = '222.5.62.128/25';
	$ip_table['au'][] = '59.135.38.128/25';
	$ip_table['au'][] = '219.108.157.0/25';
	$ip_table['au'][] = '219.125.145.0/25';
	$ip_table['au'][] = '121.111.231.0/25';
	$ip_table['au'][] = '121.111.227.0/25';
	$ip_table['au'][] = '118.152.214.192/26';
	$ip_table['au'][] = '118.159.131.0/25';
	$ip_table['au'][] = '118.159.133.0/25';
	$ip_table['au'][] = '118.159.132.160/27';
	$ip_table['au'][] = '111.86.142.0/26';
	$ip_table['au'][] = '111.86.141.64/26';
	$ip_table['au'][] = '111.86.141.128/26';
	$ip_table['au'][] = '111.86.141.192/26';
	$ip_table['au'][] = '118.159.133.192/26';
	$ip_table['au'][] = '111.86.143.192/27';
	$ip_table['au'][] = '111.86.143.224/27';
	$ip_table['au'][] = '111.86.147.0/27';

	// 2010年12月予定
	$ip_table['au'][] = '111.86.142.128/27';
	$ip_table['au'][] = '111.86.142.160/27';
	$ip_table['au'][] = '111.86.142.192/27';
	$ip_table['au'][] = '111.86.142.224/27';
	$ip_table['au'][] = '111.86.143.0/27';

	// 2011年1月予定
	$ip_table['au'][] = '111.86.143.32/27';
	$ip_table['au'][] = '111.86.147.32/27';
	$ip_table['au'][] = '111.86.147.64/27';
	$ip_table['au'][] = '111.86.147.96/27';
	$ip_table['au'][] = '111.86.147.128/27';
	$ip_table['au'][] = '111.86.147.160/27';
	$ip_table['au'][] = '111.86.147.192/27';
	$ip_table['au'][] = '111.86.147.224/27';

	// SoftBank
	// http://creation.mb.softbank.jp/web/web_ip.html
	$ip_table['softbank'] = array();
	$ip_table['softbank'][] = '123.108.237.0/27';
	$ip_table['softbank'][] = '202.253.96.224/27';
	$ip_table['softbank'][] = '210.146.7.192/26';

	// フルブラウザ
	$ip_table['softbank'][] = '123.108.237.224/27';
	$ip_table['softbank'][] = '202.253.96.0/27';

	$ip_carrier = '';
	if (empty($ip_carrier)) {
		foreach ($ip_table as $carrier => $ip_address_array) {
			foreach ($ip_address_array as $ip_address) {
				$ip_address = trim($ip_address);
				if ( strcmp($_SERVER["REMOTE_ADDR"], $ip_address) == 0 || 
					 Net_IPv4::ipInNetwork($_SERVER["REMOTE_ADDR"], $ip_address) ){
					$ip_carrier = $carrier;
					break 2;
				}

			}

		}
	}

	if (empty($ip_carrier)) {
		$ip_carrier = 'pc';
	}

	return $ip_carrier;
}


?>
<html>
<head><title>IPによるキャリア判定(Chap3)</title></head>
<body>
IPによるキャリア判定(Chap3)<br />
<hr>
▼アクセスしているキャリアは。<br>
<?php 
echo mobile_ip_carrier();
?>

</body>
</html>


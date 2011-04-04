<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'output_encode.php';

require_once 'Net/UserAgent/Mobile.php';

$agent = Net_UserAgent_Mobile::factory();

if($agent->isDoCoMo()){
	include('emoji_output_typea_docomo_view.php');
}else if($agent->isEZweb()){
	include('emoji_output_typea_au_view.php');
}else if($agent->isSoftBank()){
	include('emoji_output_typea_softbank_view.php');
}else{
	echo 'PCアクセス or スマートフォン';
}

output_encode();

?>
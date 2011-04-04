<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'Net/UserAgent/Mobile.php';

// ��ʸ�����Ѵ�ɽ�ǡ���
$emoji_data_array = '';

function emoji_output($emoji_code){
	global $emoji_data_array;


	// ���ϥǡ���
	$emoji_code = trim($emoji_code);

	// ���ϥǡ�������
	if(empty($emoji_code)){
		return '';
	}

	if(empty($emoji_data_array)){
		$emoji_data_array = array();

		$handle = fopen("emoji_output_typec_data.txt", "r");

		while(($emoji_data = fgetcsv($handle, 1000, ',')) !== false){
			if(count($emoji_data >= 4)){
				// docomo�١���
				$emoji_data_array[$emoji_data[1]] = array($emoji_data[2], $emoji_data[3]);
			}

		}
		fclose($handle);
	}

	// ���ϥǡ���
	$output_data = '';
	$agent = Net_UserAgent_Mobile::factory();

//var_dump($emoji_data_array);

	if($agent->isDoCoMo()){
		$output = $emoji_code;
	}else if($agent->isEZweb()){
		$output = trim($emoji_data_array[$emoji_code][0]);
	}else if($agent->isSoftBank()){
		$output = trim($emoji_data_array[$emoji_code][1]);
	}else{
		$output = 'PC or ���ޥۤϳ�ʸ����ɽ���Ǥ��ޤ���';
	}

	return $output;
}


?>
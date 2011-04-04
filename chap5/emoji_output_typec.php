<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'Net/UserAgent/Mobile.php';

// 絵文字対変換表データ
$emoji_data_array = '';

function emoji_output($emoji_code){
	global $emoji_data_array;


	// 入力データ
	$emoji_code = trim($emoji_code);

	// 入力データが空
	if(empty($emoji_code)){
		return '';
	}

	if(empty($emoji_data_array)){
		$emoji_data_array = array();

		$handle = fopen("emoji_output_typec_data.txt", "r");

		while(($emoji_data = fgetcsv($handle, 1000, ',')) !== false){
			if(count($emoji_data >= 4)){
				// docomoベース
				$emoji_data_array[$emoji_data[1]] = array($emoji_data[2], $emoji_data[3]);
			}

		}
		fclose($handle);
	}

	// 出力データ
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
		$output = 'PC or スマホは絵文字を表示できません。';
	}

	return $output;
}


?>
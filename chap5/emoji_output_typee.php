<?php

require_once 'Net/UserAgent/Mobile.php';

// キャリア絵文字変換表データ
$emoji_data_array = '';

function emoji_output_change($matches){
	global $emoji_data_array;

	if(empty($matches) || !is_array($matches) || count($matches)  != 2){
		return '';
	}

	$emoji_num = $matches[1];
	$emoji_num = trim($emoji_num);

	if(empty($emoji_num)){
		return '';
	}

	if(empty($emoji_data_array)){
		$emoji_data_array = array();

		$handle = fopen("emoji_output_typee_data.txt", "r");

		while(($emoji_data = fgetcsv($handle, 1000, ',')) !== false){
			$emoji_data_array[$emoji_data[0]] = array($emoji_data[2], $emoji_data[3], $emoji_data[4]);
		}

		fclose($handle);
	}

	// 出力データ
	$output = '';

	$agent = Net_UserAgent_Mobile::factory();

	if($agent->isDoCoMo()){
		$output = trim($emoji_data_array[$emoji_num][0]);
	}else if($agent->isEZweb()){
		$output = trim($emoji_data_array[$emoji_num][1]);
	}else if($agent->isSoftBank()){
		$output = trim($emoji_data_array[$emoji_num][2]);
	}else{
		$output = "";
	}

	if(empty($output)){
		$outout = '=';
	}

	return $output;
}

function emoji_output(){
	$output_str = ob_get_contents();

	ob_end_clean();

	$output_str = preg_replace_callback('/<emoji=([0-9]+)>/', 'emoji_output_change', $output_str);

	echo $output_str;

}

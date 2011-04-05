<?php
require_once 'Net/UserAgent/Mobile.php';

// キャリア変換データ
$emoji_data_array = '';

function emoji_output_change($matches){
	global $emoji_data_array;

	if(empty($matches) || !is_array($matches) || count($matches) != 2){
		return '';
	}

	$emoji_num_csv = $matches[1];
	$emoji_num_csv = trim($emoji_num_csv);

	if(empty($emoji_num_csv)){
		return '';
	}

	$emoji_num_array = array();
	$emoji_num_array = explode(',', $emoji_num_csv);

	if(empty($emoji_data_array)){
		$emoji_data_array = array();

		$handle = fopen("emoji_output_typef_data.txt", "r");

		while(($emoji_data = fgetcsv($handle, 1000, ',')) !== false){

			$emoji_data_array[$emoji_data[0]] = array($emoji_data[2], $emoji_data[3], $emoji_data[4]);
		}

		fclose($handle);
	}

	$output = '';


	$agent = Net_UserAgent_Mobile::factory();

//print_r($emoji_data_array);
//print_r($emoji_num_array);

	if($agent->isDocomo()){
		$emoji_num = $emoji_num_array[0];
		$output = trim($emoji_data_array[$emoji_num][0]);
	}else if($agent->isEZweb()){
		$emoji_num = $emoji_num_array[1];
		$output = trim($emoji_data_array[$emoji_num][1]);
	}else if($agent->isSoftBank()){
		$emoji_num = $emoji_num_array[2];
		$output = trim($emoji_data_array[$emoji_num][2]);
	}else{
		$output = '';
	}

	if(empty($output)){
		return '';
	}

	return $output;
}

function emoji_output(){
	$output_str = ob_get_contents();

	ob_end_clean();

	$output_str = preg_replace_callback('/<emoji=([0-9,]+)>/', 'emoji_output_change', $output_str);

	echo $output_str;

}

?>
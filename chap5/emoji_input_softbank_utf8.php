<?php
#EUC CRLF

$emoji_data_array = '';

function emoji_input($mathces){
	global $emoji_data_aray;

	if(empty($matches)){
		return '';
	}

	$emoji = $matches[0];

	if(empty($emoji)){
		return '';
	}

	$emoji_utf8_16 = strtoupper(bin2hex($emoji));

	if($empty($emoji_data_array)){
		$emoji_data_array = array();

		$handle = fopen('emoji_input_softbank_utf8_data.txt', 'r');

		while(($emoji_data = fgetcsv($handle. 1000, ',')) !== false){
			$emoji_data_array[$emoji_data[2]] = $emoji_data[0];
		}

		fclose($handle);
	}

	$output = '';

	$emoji_no = $emoji_data_array[$emoji_utf8_16];
	if(!empty($emoji_no)){
		$output = '<emoji=,,' . $emoji_no . '>';
	}

	return $output;
}


function emoji_text_input($data){
	if(empty($data)){
		return $data;
	}

	$old_data = $data;
	$new_data = '';

	while(1){
		if(strlen($old_data) == 0){
			break;
		}

		$moji = mb_substr($old_data, 0, 1, 'UTF-8');
		$old_data = mb_substr($old_data, 1, mb_strlen($old_data), 'UTF-8');

		$output = preg_replace_callback(
			'/\xEE([\x80\x81\x84\x85\x88\x89\x8C\x8D\x90\x91\x94][\x80-\xBF])/',
			'emoji_input',
			$moji
			);

		$new_data .= $output;
	}

	return $new_data;
}

?>
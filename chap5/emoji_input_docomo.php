<?php
$emoji_data_array = '';

function emoji_input($matches){
	global $emoji_data_array;

	if(empty($matches)){
		return '';
	}

	$emoji = $matches[0];

	if(empty($emoji)){
		return '';
	}
	

	$emoji_sjis16 = strtoupper(bin2hex($emoji));

	if(empty($emoji_data_array)){
		$emoji_data_array = array();

		$handle = fopen("emoji_input_docomo_data.txt", "r");

		while(($emoji_data = fgetcsv($handle, 1000, ',')) !== false){
			$emoji_data_array[$emoji_data[2]] = $emoji_data[0];
		}
		fclose($handle);
	}

	$output;
	$emoji_no = $emoji_data_array[$emoji_sjis16];


	if(!empty($emoji_no)){
		$output = '<emoji=' . $emoji_no . ',,>';
	}

	return $output;

}


function emoji_text_input($data){
	if(empty($data)){
		return $data;
	}

	$output = preg_replace_callback('/(\xF8[\x9F-\xFC])|(\xF9[\x40-\xFC])/', 'emoji_input', $data);

	return $output;
}


?>
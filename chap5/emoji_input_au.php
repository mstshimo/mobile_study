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

		$handle = fopen("emoji_input_au_data.txt", "r");

		while(($emoji_data = fgetcsv($handle, 1000, ',')) !== false){
			$emoji_data_array[$emoji_data[2]] = $emoji_data[0];
		}
		fclose($handle);
	}

	$output;
	$emoji_no = $emoji_data_array[$emoji_sjis16];


	if(!empty($emoji_no)){
		$output = '<emoji=,' . $emoji_no . ',>';
	}

	return $output;

}


function emoji_text_input($data){
	if(empty($data)){
		return $data;
	}

	$output = preg_replace_callback('/[\xF3\xF4\xF6\xF7][\x40-\xFC]/', 'emoji_input', $data);

	return $output;
}


function emoji_text_input_patch($data_patch){
	if(empty($data_patch)){
		return $data_patch;
	}

	$old_data = $data_patch;
	$new_data = '';

	while(1){
		if(mb_strlen($old_data) == 0){
			break;
		}

		// mb_substrは、バイトに関係なく、1文字として取得できる。
		$moji = mb_substr($old_data, 0, 1, 'SJIS-win');
		$old_data = mb_substr($old_data, 1, mb_strlen($old_data), 'SJIS-win');

		$output = preg_replace_callback('/[\xF3\xF4\xF6\xF7][\x40-\xFC]/', 'emoji_input', $moji);

		$new_data .= $output;
	}


	return $new_data;
}


?>
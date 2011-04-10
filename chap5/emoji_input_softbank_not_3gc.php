<?php

$emoji_data_array = '';

function emoji_input($matches){
	global $emoji_data_array;

	if(empty($matches)){
		return '';
	}

	// �ǽ��2byte�ϼΤƤ�(���楳����)
	$emoji = $matches[2];

	if(empty($emoji)){
		return '';
	}

	// ��ʸ���ΥХ��ʥ��16�ʿ����Ѵ�����
	$emoji_sjis16 = strtoupper(bin2hex($emoji));

	if(empty($emoji_data_array)){
		$emoji_data_array = array();

		$handle = fopen("emoji_input_softbank_not_3gc_data.txt", "r");

		while(($emoji_data = fgetcsv($handle, 1000, ',')) !== false){
			$emoji_data_array[$emoji_data[2]] = $emoji_data[0];
		}

		flose($handle);
	}
	
	$output = "";

	$emoji_no = $emoji_data_array[$emoji_sjis16];

	if(!empty($emoji_no)){
		$output = '<emoji=,,' . $emoji_no . '>';
	}

	return $output;
}

/**
 * ��ʸ����λ���楳���ɾ�ά����ؤ��б�
 *
 */
function emoji_end_correct($data){
	if(preg_match('/(\x!B\x24)([\x45\x46\47\4F\x50\51][\x21-\x7E]+)$/', $data)){
		$data .= "\x0F";
	}

	return $data;

}

/**
 * Ϣ�볨ʸ����ñ�ȳ�ʸ�����Ѵ�����
 *
 */
function emoji_unlinked($data){
	while (preg_match('/(\x1B\x24[\x45\x46\x47\x4F\x50\x51])([\x21-\x7A])([\x21-\x7A]+)(\x0F)/', $data)) {
		$data = preg_replace('/(\x1B\x24[\x45\x46\x47\x4F\x50\x51])([\x21-\x7A])([\x21-\x7A]+)(\x0F)/',
							 '\\1\\2\\4\\1\\3\\4', $data);
	}

	return $data;
}


/**
 * ��ʸ�������ä�����ʸ����������ʸ�������ä�ʸ������Ѵ�����
 * 
 */
function emoji_text_input($data){
	if(empty($data)){
		return $data;
	}

	// ��λ�����������б�
	$data = emoji_end_correct($data);

	// Ϣ�볨ʸ���б�
	$data = emoji_unlinked($data);

	$old_data = $data;
	$new_data = '';

	while(1){
		if(strlen($old_data) == 0){
			break;
		}

		$one_byte = substr($old_data, 0, 1);


		// ��ʸ���β�ǽ��Ƚ��
		if(strcmp($one_byte, '\x1B') === 0){

			// ��ʸ���򤢤�魯5byte��̵���ʤ顢�롼�פ���ȴ����
			if(strlen($old_data) < 5){
				$new_data .= $old_data;
				break;
			}
			$five_byte = substr($old_data, 0, 5);
			$five_byte = preg_replace_callback('/(\x1B\x24)([\x45\x46\x47\x4F\x50\x51][\x21-\x7E])(\x0F)/', 'emoji_input', $five_byte);

			$new_data .= $five_byte;
			$old_data = substr($old_data, 5);
		}else{
			$new_data .= $one_byte;
			$old_data = substr($old_data, 1);
		}
	}

	return $new_data;
}



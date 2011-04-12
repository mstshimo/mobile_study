<?php
# EUC CRLF

require_once 'Net/UserAgent/Mobile.php';

function input_encode(){
	$input_code = 'SJIS-win';

	$agent = Net_UserAgent_Mobile::factory();

	if($agent->isSoftBank()){
		if($agent->isType3GC()){
			$input_code = 'UTF-8';
		}
	}else{
		$input_code = 'SJIS-win';
	}

	if(isset($_GET)){
		mb_convert_variables(mb_internal_encoding(), $input_code, $GET);
	}

	if(isset($_POST)){
//		mb_convert_variables(mb_internal_encoding(), $input_code, $POST);
	}
}

?>
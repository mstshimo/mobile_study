<?php
# EUC CRLF

# ����ʸ�������ɤ����ʸ�������ɤ��Ѵ�

ini_set('display_errors','On');
error_reporting(E_ALL);

require_once 'Net/UserAgent/Mobile.php';

function output_encode(){

	$output_encode = 'SJIS-win';

	$agent = Net_UserAgent_Mobile::factory();
	if($agent->isSoftBank()){
		if($agent->isType3GC()){
			$output_encode = 'UTF-8';
		}
	}

	ini_set('mbstring.http_output', $output_encode);

}

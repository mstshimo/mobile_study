<?php
ini_set('display_errors','On');
error_reporting(E_ALL);

# EUC CRLF
/*
 * ����ʸ�������ɤ���ʸ�������ɤ��Ѵ����롣
 *
 */
function output_encode(){
	ini_set('mbstring.http_output', 'SJIS-win');
}

?>
<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

# EUC CRLF

// ���������R�[�h���o�͕����R�[�h�ɕϊ�����B
function output_encode(){
	ini_set('mbstring.http_output', 'SJIS-win');
}

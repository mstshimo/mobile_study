<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

# EUC CRLF

// 内部文字コードを出力文字コードに変換する。
function output_encode(){
	ini_set('mbstring.http_output', 'SJIS-win');
}

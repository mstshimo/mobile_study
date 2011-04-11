<?php
# EUC CRLF

/*
 * 外部文字コードを(携帯からの入力)、内部文字コードに変換する。
 * 絵文字に対応する為に、'SJIS-win'を指定。
 *
 */ 
function input_encode(){

	if(isset($_GET)){
		mb_convert_variables(mb_internal_encoding(), 'SJIS-win', $_GET);
	}

	if(isset($_POST)){
		mb_convert_variables(mb_internal_encoding(), 'SJIS-win', $_POST);
	}
}
?>

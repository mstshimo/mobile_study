<?php
# EUC CRLF

/*
 * ����ʸ�������ɤ�(���Ӥ��������)������ʸ�������ɤ��Ѵ����롣
 * ��ʸ�����б�����٤ˡ�'SJIS-win'����ꡣ
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

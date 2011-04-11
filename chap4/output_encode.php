<?php

function output_encode(){
	$str = ob_get_contents();

	$output = mb_convert_encoding($str, 'SJIS-win', mb_internal_encoding());

	ob_end_clean();

	header('Cotent-Type: applicaction/xhtml+xml');

	echo $output;

}


?>
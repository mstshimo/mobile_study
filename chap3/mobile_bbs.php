<?php
# EUC CRLF
ini_set('display_errors','On');

# ライブラリ
require_once 'input_encode.php';
require_once 'output_encode.php';

// 内部文字コードに変換
input_encode();


# GETリクエストを取り込み
if(isset($_GET['comment'])){
	$comment = $_GET['comment'];
	$comment = str_replace(array('\r', '\n'), '', $comment);
}

# データファイル
$filename = 'mobile_bbs_data.txt';

if(!file_exists($filename)){
	touch($file_name);
}

# ファイルオープン
$handle = fopen($filename, 'a+');

# コメントがあれば、追記
if(isset($comment)){
	# rewind($fp); と等価。
	fseek($handle, 0);
	fwrite($handle, $comment . '\n');
}


$comment_list = array();
if(filesize($filename) > 0){
	fseek($handle, 0);
	$data = fread($handle, filesize($filename));
	$comment_list = explode('\n', $data);
	$comment_list = array_reverse($comment_list);
}

# ファイルクローズ
fclose($handle);

?>
<?xml version="1.0" encoding="shift_jis" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-type" content="text/html; charset=Shift_JIS" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<title></title>
</head>

<body>
mstshimoのﾓﾊﾞｲﾙ掲示板<br />
<hr>

<form action="" method="get">
<input type="text" name="comment" value="" />
<input type="submit" value="書き込み" />
</form>

<hr />


<?php
	foreach($comment_list as $comment_item){
		if(!empty($comment_item)){
			echo $comment_item . '<br /><hr />';

		}
	}
?>

</body>
</html>
<?php
	output_encode();
?>

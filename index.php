<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift-JIS'" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<title>携帯サイト学習</title>
</head>
<body>
携帯サイト学習<br />
<hr>
作成したプログラムはgithubにコミットしてあります。<br />
<a href="http://github.com/mstshimo/mobile_study/">github(PCからのみ)</a><br />
<br />

PHPと言うプログラミング言語で作成しています。<br />
PHP5.3を利用していますが、PEARとライブラリが5.3上では<br />
エラーになる箇所があり、特にdocomoでエラーが見えています。<br />

1.<a href="chap3/mobile_bbs.php">1行掲示板</a><br />

3-1.<a href="chap3/chap3_carrier.php">キャリア、機種判別</a><br />

3-2.<a href="chap3/mobile_ip_carrier.php">IPによる、キャリア判別</a><br />

4.端末に最適な画面で画像を表示する<br>
4-1.<a href="chap4/chap4_xhtml.php">XHTML表示</a><br />

4-2.携帯端末に最適な画像を出力<br>
<a href="chap4/mobile_image_size.php?image_name=profile-m.jpg">みかん猫</a><br />
<a href="chap4/mobile_image_size.php?image_name=profile-s.jpg">入ってる猫</a><br />
<a href="chap4/mobile_image_size.php?image_name=cat_punch.png">猫パンチ(docomo見れません)</a><br />
<a href="chap4/mobile_image_size.php?image_name=cat_punch.gif">猫パンチ(gif)</a><br />
<a href="chap4/mobile_image_size.php?image_name=boxcat.gif">box猫</a><br />

5.各キャリア絵文字表示<br />
各キャリアで表示するページを切り替えています。<br />
複数キャリア持っている人は試してみてね。<br />
5-a.<a href="chap5/emojioutput_typea.php">出力ページ単位切り替え方式</a><br />

</body>

<?php
require_once 'chap3/output_encode.php';
output_encode();
?>
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

1.<a href="chap2/mobile_bbs.php">1行掲示板</a><br />

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
5-a.<a href="chap5/emoji_output_typea.php">出力ページ単位切り替え方式</a><br />
5-b.<a href="chap5/emoji_output_typeb.php">絵文字単位切り替え方式</a><br />
5-c.<a href="chap5/emoji_output_typec_view.php">絵文字単位切り替え方式</a><br />
5-d. cと似ていたので省略<br />
5-e. <a href="chap5/emoji_output_typee_view.php">内部絵文字管理方式</a><br />
5-f. <a href="chap5/emoji_output_typef_view.php">キャリア別内部絵文字管理方式</a><br />

5-aa. <a href="chap5/emoji_input_docomo_view.php">絵文字入力を取得する(docomo)</a><br />
5-ab. <a href="chap5/emoji_input_au_view.php">絵文字入力を取得する(au)</a><br />
5-ac. <a href="chap5/emoji_input_softbank_not_3gc_view.php">絵文字入力を取得する(3GC以外のsoftbank)端末がないから試してない。</a><br />
5-ad. <a href="chap5/emoji_input_softbank_sjis_view.php">絵文字入力を取得する(3GC端末)</a><br />



<br />
脱線:検索ロボットのテスト(googleにクロールさせて、検索に引っかかるかのテスト)<br />
analyticsも入れてみた。<br />
<a href="http://msworks.homelinux.com/robot_test/index.html"></a>
</body>

<?php
require_once 'chap2/output_encode.php';
output_encode();
?>
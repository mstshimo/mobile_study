<?php

require_once 'output_encode.php';

require_once 'mobile_xhtml_doctype.php';

ob_start();

?>
<?xml version="1.0" encoding="Shift_JIS" ?>
<?php echo mobile_xhtml_doctype(); ?>
<html>
<head>
<meta http-eqiv="Content-Type" content="application/xhtml-xml; charset='Shift_JIS'" />
<meta http-eqiv="Pragma" content="no-cache" />
<meta http-eqiv="Cache-Control" content="no-cache" />
<meta http-eqiv="Expires" content="-1" />
<title>XHTMLで表示する(Chap4)</title>
</head>
<body>
XHTMLで表示する(Chap4)
<hr>
<div style="text-align:center; font-size:xx-small;">
このページXHTMLで表示されています。
キャリアによって、doctype宣言を書き換えています。
ソースを見ると分かります。
</div>
</body>
</html>

<?php
output_encode();
?>
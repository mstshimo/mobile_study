<?php
require_once "Mail_mime_Decomail_au.php";

$to = '';

$from = '';

$encoding = 'Shift_JIS';

// 件名
$subject = 'htmlテストメールMail_mime_Decomail';
$subject = mb_encode_mimeheader($subject, $encoding);

// 本文テキスト
$body_text_filename = 'body_text.txt';
$handle = fopen($body_text_filename, 'r');
$body_text = fread($handle, filesize($body_text_filename));
fclose($handle);
$body_text = mb_convert_encoding($body_text, 'SJIS-win', mb_internal_encoding());

// 本文html
$body_html_filename = 'body_html.html';
$handle = fopen($body_html_filename, 'r');
$body_html = fread($handle, filesize($body_html_filename));
fclose($handle);
$body_html = mb_convert_encoding($body_html, 'SJIS-win', mb_internal_encoding());
$body_html = str_replace("\n", "", $body); #auは改行があっては駄目。

$decomail = new Mail_mime_Decomail_au("\n");
$decomail->setFrom($from);
$decomail->setTXTBody($body_text, true);
$decomail->setHTMLBody($body_html, true);

$decomail->addHTMLImage('boxcat.gif', 'image/gif');

$params = array();
$params['head_charset'] = $encoding;
$params['text_charset'] = $encoding;
$params['html_charset'] = $encoding;

// 本文取得
$body = $decomail->get($params);
$body = str_replace("\r\n", "\n", $body);

// ヘッダー取得
$header = $decomail->txtHeaders();

mail($to, $subject, $body, $header);


?>
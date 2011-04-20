<?php
require_once "Mail_mime_Decomail.php";

$to = '';

$from = '';

$encoding = 'UTF-8';

// 件名
$subject = 'htmlテストメールMail_mime_Decomail';
$subject = mb_encode_mimeheader($subject, $encoding);

// 本文テキスト
$body_text_filename = 'body_text.txt';
$handle = fopen($body_text_filename, 'r');
$body_text = fread($handle, filesize($body_text_filename));
fclose($handle);
$body_text = mb_convert_encoding($body_text, $encoding, mb_internal_encoding());

// 本文html
$body_html_filename = 'body_html.html';
$handle = fopen($body_html_filename, 'r');
$body_html = fread($handle, filesize($body_html_filename));
fclose($handle);
$body_html = mb_convert_encoding($body_html, $encoding, mb_internal_encoding());

$decomail = new Mail_Mime_Decomail("\n");
$decomail->setFrom($from);
$decomail->setTXTBody($body_text);
$decomail->setHTMLBody($body_html);

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
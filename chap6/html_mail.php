<?php
require_once 'Mail/mime.php';

$to = '';

$from = '';

$encoding = 'ISO-2022-JP';

$subject = 'html�ƥ��ȥ᡼��';
$subject = mb_encode_mimeheader($subject, $encoding);

$body_text_filename = 'body_text.txt';
$handle = fopen($body_text_filename, 'r');
$body_text = fread($handle, filesize($body_text_filename));
fclose($handle);
$body_text = mb_convert_encoding($body_text, $encoding, mb_internal_encoding());

$body_html_filename = 'body_html.html';
$handle = fopen($body_html_filename, 'r');
$body_html = fread($handle, filesize($body_html_filename));
fclose($handle);
$body_html = mb_convert_encoding($body_html, $encoding, mb_internal_encoding());

$decomail = new Mail_mime("\n");
$decomail->setFrom($from);
$decomail->setTXTBody($body_text);
$decomail->setHTMLBody($body_html);

$decomail->addHTMLImage('../chap4/image/boxcat.gif', 'image/gif');

$params = array();
$params['head_charset'] = $encoding;
$params['text_charset'] = $encoding;
$params['html_charset'] = $encoding;

// ��ʸ����
$body = $decomail->get($params);
$body = str_replace('\r\n', '\n', $body);

// �إå�������
$header = $decomail->txtHeaders();

mail($to, $subject, $body, $header);


?>
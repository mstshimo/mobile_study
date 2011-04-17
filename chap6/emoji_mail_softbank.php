<?php
require_once 'Mail.php';

// Á÷¿®Àè
$recipients = '';

$from = '';

$emoji = "\$Gj";
$subject = '¤³¤ó¤Ë¤Á¤Ïsoftbank';

$subject = mb_convert_encoding($subject,"SJIS-win", mb_internal_encoding());
$subject .= $emoji;


$subject = base64_encode($subject);
$subject = '=?Shift-JIS?B?' . $subject . '?=';

$body = 'º£Æü¤ÏÀ²¤ìsoftbank';
$body = mb_convert_encoding($body, 'SJIS-win', mb_internal_encoding());
$body .= $emoji;

$body = base64_encode($body);

// Á÷¿®¥Ø¥Ã¥À
$headers = array();
$headers['From'] = $from;
$headers['To'] = $recipients;
$headers['Subject'] = $subject;
$headers['Sender'] = $from;
$headers['MIME-Version'] = '1.0';
$headers['Content-Type'] = 'text/plain; charset=Shift-JIS';
$headers['Content-Transfer-Encoding'] = 'base64';



// ¥á¡¼¥ëÇÛ¿®
$mail = Mail::factory('sendmail');
$result = $mail->send($recipients, $headers, $body);

?>


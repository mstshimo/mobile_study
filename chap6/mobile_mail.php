<?php
require_once 'Mail.php';

// 送信先
$recipients = '';

$from = '';

$subject = 'test';

$body = 'サンプル本文';

$subject = mb_encode_mimeheader($subject, 'ISO-2022-JP');

$body = mb_convert_encoding($body, 'ISO-2022-JP', mb_internal_encoding());

$headers = array();
$headers['From'] = $from;
$headers['To'] = $recipients;
$headers['Subject'] = $subject;
$headers['Sender'] = $from;

// メール配信
$mail = Mail::factory('sendmail');
$result = $mail->send($recipients, $headers, $body);

?>

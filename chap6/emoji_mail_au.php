<?php
require_once 'Mail.php';

// 送信先
$recipients = '';

$from = '';

$emoji = "\xEB\x60";
$subject = 'こんにちはau';

$subject = mb_convert_encoding($subject,"SJIS-win", mb_internal_encoding());
$subject .= $emoji;


$subject = base64_encode($subject);
$subject = '=?Shift-JIS?B?' . $subject . '?=';

$body = '今日は晴れau';
$body = mb_convert_encoding($body, 'SJIS-win', mb_internal_encoding());
$body .= $emoji;

$body = base64_encode($body);

// 送信ヘッダ
$headers = array();
$headers['From'] = $from;
$headers['To'] = $recipients;
$headers['Subject'] = $subject;
$headers['Sender'] = $from;
$headers['MIME-Version'] = '1.0';
$headers['Content-Type'] = 'text/plain; charset=Shift-JIS';
$headers['Content-Transfer-Encoding'] = 'base64';

// メール配信
$mail = Mail::factory('sendmail');
$result = $mail->send($recipients, $headers, $body);


?>

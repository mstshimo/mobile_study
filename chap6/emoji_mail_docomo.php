<?php
require_once 'Mail.php';

// ������
$recipients = '';

$from = '';

$emoji = "\xF8\x9F";
$subject = '����ˤ���';

$subject = mb_convert_encoding($subject,"SJIS-win", mb_internal_encoding());
$subject .= $emoji;


$subject = base64_encode($subject);
$subject = '=?Shift-JIS?B?' . $subject . '?=';

$body = '����������';
$body = mb_convert_encoding($body, 'SJIS-win', mb_internal_encoding());
$body .= $emoji;

$body = base64_encode($body);

// �����إå�
$headers = array();
$headers['From'] = $from;
$headers['To'] = $recipeints;
$headers['Subject'] = $subject;
$headers['Sender'] = $from;
$headers['MIME-Version'] = '1.0';
$headers['Content-Type'] = 'text/plain; charset=Shift-JIS';
$headers['Content-Transfer-Encoding'] = 'base64';



// �᡼���ۿ�
$mail = Mail::factory('sendmail');
$result = $mail->send($recipients, $headers, $body);

?>

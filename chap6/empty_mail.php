<?php
require_once 'Mail.php';

require_once 'Mail/mimeDecode.php';

// •W€“ü—Í‚ðŽæ“¾‚·‚é
$source = file_get_contents('php://stdin');
if (!$source) {
	exit();
}

$fp = fopen("/tmp/sample.txt", "a");
#fwrite($fp, "$source");
#fwrite($fp, "\n");
fclose($fp);

$decoder = new Mail_mimeDecode($source);
$structure = $decoder->decode();

// ‘—MŒ³Žæ“¾
$from = $structure->headers['from'];


$from = mb_decode_mimeheader($from);
$from = mb_convert_encoding($from, mb_internal_encoding(), 'auto');
if (preg_match('/<(.*?)>$/', $from, $match)) {
	$from = $match['1'];
}
$fp = fopen("/tmp/sample.txt", "a");

$from = trim($from);
$from = strtolower($from);

foreach ($match as $key => $val) {
	fwrite($fp, "key = $key : val:$val ");
	fwrite($fp, "\n");
}
fwrite($fp, "from:$from");

fclose($fp);

$recipients = $from;
$new_from = 'regist@msworks.homelinux.com';
$subject = 'empty mail';
$body = <<<EOL
Registration success.
In order to cancel, you need 50,000 yen..
EOL;

$recipients = mb_convert_encoding($recipients, 'ISO-2022-JP', mb_internal_encoding());
$subject = mb_encode_mimeheader($subject, 'ISO-2022-JP');
$body = mb_convert_encoding($body, 'ISO-2022-JP',mb_internal_encoding());

$headers = array();
$headers['From'] = $new_from;
$headers['To'] = $recipients;
$headers['Subject'] = $subject;
$headers['Sender'] = $new_from;

$mail = Mail::factory('sendmail');
$result = $mail->send($recipients, $headers, $body);



?>
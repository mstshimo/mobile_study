<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'output_encode.php';

require_once 'Net/UserAgent/Mobile.php';

$agent = Net_UserAgent_Mobile::factory();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset='Shift_JIS'" />
<?php
if($agent->isDoCoMo()){
?>

こんにちは! &#xE63E;
docomoですね。

<?php
}else if($agent->isEZweb()){
?>

こんにちは! <img localsrc="44">
auですね。

<?php
}else if($agent->isSoftBank()){
?>

こんにちは! &#xE04A;
softbankですね。

<?php
}else{
?>

こんにちは!
PCアクセス か スマートフォンですね

<?php
}

output_encode();
?>
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

����ˤ���! &#xE63E;
docomo�Ǥ��͡�

<?php
}else if($agent->isEZweb()){
?>

����ˤ���! <img localsrc="44">
au�Ǥ��͡�

<?php
}else if($agent->isSoftBank()){
?>

����ˤ���! &#xE04A;
softbank�Ǥ��͡�

<?php
}else{
?>

����ˤ���!
PC�������� �� ���ޡ��ȥե���Ǥ���

<?php
}

output_encode();
?>
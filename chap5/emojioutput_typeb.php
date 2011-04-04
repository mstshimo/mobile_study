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

､ｳ､ﾋ､ﾁ､ﾏ! &#xE63E;
docomo､ﾇ､ｹ､ﾍ｡｣

<?php
}else if($agent->isEZweb()){
?>

､ｳ､ﾋ､ﾁ､ﾏ! <img localsrc="44">
au､ﾇ､ｹ､ﾍ｡｣

<?php
}else if($agent->isSoftBank()){
?>

､ｳ､ﾋ､ﾁ､ﾏ! &#xE04A;
softbank､ﾇ､ｹ､ﾍ｡｣

<?php
}else{
?>

､ｳ､ﾋ､ﾁ､ﾏ!
PC･｢･ｯ･ｻ･ｹ ､ｫ ･ｹ･ﾞ｡ｼ･ﾈ･ﾕ･ｩ･ﾇ､ｹ､ﾍ

<?php
}

output_encode();
?>
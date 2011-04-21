<?php

require_once 'Net/UserAgent/Mobile.php';

$agent = Net_UserAgent_Mobile::factory();

# FOMA端末製造番号
$mobile_id = $agent->getSerialNumber();

# FOMAカード製造番号
$forma_card_id = $agent->getCardID();


echo "あなたのFOMA端末製造番号は(15桁英数字)<br />";
echo $mobile_id;

echo "<br />";
echo "あなたのFOMAカード番号は(20桁英数字)<br />";
echo $forma_card_id;

$i_mode_id = $_SERVER['HTTP_X_DCMGUID'];

echo "<br />";
echo "あなたのiモードIDは(7桁英数字)<br />";
echo $i_mode_id;

#var_dump($_SERVER);
?>

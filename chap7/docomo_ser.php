<?php

require_once 'Net/UserAgent/Mobile.php';

$agent = Net_UserAgent_Mobile::factory();

# FOMAü����¤�ֹ�
$mobile_id = $agent->getSerialNumber();

# FOMA��������¤�ֹ�
$forma_card_id = $agent->getCardID();


echo "���ʤ���FOMAü����¤�ֹ��(15��ѿ���)<br />";
echo $mobile_id;

echo "<br />";
echo "���ʤ���FOMA�������ֹ��(20��ѿ���)<br />";
echo $forma_card_id;

$i_mode_id = $_SERVER['HTTP_X_DCMGUID'];

echo "<br />";
echo "���ʤ���i�⡼��ID��(7��ѿ���)<br />";
echo $i_mode_id;

#var_dump($_SERVER);
?>

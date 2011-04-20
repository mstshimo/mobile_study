<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
#error_reporting(E_ALL);

ini_set('display_errors', '1');

require_once 'Net/UserAgent/Mobile.php';

// ������¸��
$image_path = '/var/www/html/mobile/chap4/image/';

// ����̾���������
if(isset($_GET['image_name']) && !empty($_GET['image_name'])){
	$image_name = $_GET['image_name'];
}else{
	header('HTTP/10. 204 No Content');
	exit();
}

// ������¸�ߥ����å�
$image_file = $image_path . $image_name;
if(!file_exists($image_file)){
	header('HTTP/10. 204 No Content');
	exit();
}

//���ꤵ�줿�����γ�ĥ�Ҥ��ǧ���롣
$path_parts = pathinfo($image_name);
$image_extension = $path_parts['extension'];

$image_type = '';
if(preg_match('/jp[g|eg]/i', $image_extension)){
	$image_type = 'jpg';
}else if(preg_match('/gif/i', $image_extension)){
	$image_type = 'gif';
}else if(preg_match('/png/i', $image_extension)){
	$image_type = 'png';
}else{
	header('HTTP/1.0 204 No Content');
	exit();
}

// ���ӥ���ꥢȽ��
$agent = Net_UserAgent_Mobile::factory();

// ���Ӥ˽��Ϥ��������������ꤹ��
$output_image_type = $image_type;

if($agent->isDoCoMo()){
	if(! $agent->isFOMA()){
		$ouput_image_type = 'gif';
	}else{
		// png�����ʤ�С�gif���Ѵ�
		if(strcmp($image_type, 'png') == 0){
			$output_image_type = 'gif';
		}
	}
}else if($agent->isEZweb()){
	// WAP2.0�Ǥʤ���С�png���Ѵ�
	if(!$agent->isWAP2()){
		$output_image_type = 'png';
	}

}else if($agent->isSoftBank()){
	// W���⤷����3GC���Ǥʤ���С�png�������Ѵ�
	if(!$agent->isTypeW() && !$agent->isType3GC()){
		$output_image_type = 'png';
	}
}

// ���Ӥβ������������������
$display = $agent->getDisplay();

// �֥饦��ɽ����ǽ�ԥ�����
$view_x = $display->getWidth();

if(empty($view_x)){
	// �ǥե��������
	$view_x = '240';
}

$view_y = $display->getHeight();
if(empty($view_y)){
	// �ǥե��������
	$view_y = '320';
}


// �����򳫤�
if(strcmp($output_image_type, 'jpg') == 0){
	$image_data = @imagecreatefromjpeg($image_file);
}else if(strcmp($output_image_type, 'gif') == 0){
	$image_data = @imagecreatefromgif($image_file);
}else{
	$image_data = @imagecreatefrompng($image_file);
}

// �ɤ߹���������Υ���������
$image_x = @imagesx($image_data);
$image_y = @imagesy($image_data);

// �����ڥ�������ݤä��ޤ޽��Ϥ����������������ꤹ��
$output_image_x = $image_x;
$output_image_y = $image_y;

// �ꥵ����
if($image_x > $image_y){
	if($image_x > $view_x){
		$output_image_x = $view_x;
		$output_image_y = $image_y * ($view_x / $image_x);
	}
}else{
	if($image_y > $image_y){
		$output_image_x = $image_x * ($view_y / $image_y);
		$output_image_y = $view_y;
	}
}

// �ե������ɤ߹���
if(strcmp($output_image_type, $image_type) == 0 
&& strcmp($output_image_x, $image_x) == 0 
&& strcmp($output_image_y, $image_y) == 0){

	if(strcmp($output_image_type, 'jpg')){
		header('Content-Type: image/jpeg');
	}else if(strcmp($output_image_type, 'gif')){
		header('Content-Type: image/gif');
	}else{
		header('Content-Type: image/png');
	}

	readfile($image_file);
}


// ���ϲ������������
if(strcmp($output_image_type, 'jpg') == 0){
	// ���ʲ���
	$output_image_data = @imagecreatetruecolor($output_image_x, $output_image_y);
	@imagecopyresampled($output_image_data, $image_data, 0, 0, 0, 0, $output_image_x, $output_image_y, $image_x, $image_y);

	header('Content-Type: image/jpeg');
	@imagejpeg($output_image_data);

}else if(strcmp($output_image_type, 'gif') == 0){

	$output_image_data = @imagecreate($output_image_x, $output_image_y);
	@imagecopyresized($output_image_data, $image_data, 0, 0, 0, 0, $output_image_x, $output_image_y, $image_x, $image_y);

	header('Content-Type: image/gif');
	@imagegif($output_image_data);

}else{

	// ���ʲ���
	$output_image_data = @imagecreatetruecolor($output_image_x, $output_image_y);
	@imagecopyresampled($output_image_data, $image_data, 0, 0, 0, 0, $output_image_x, $output_image_y, $image_x, $image_y);
	header('Content-Type: image/png');
	@imagepng($output_image_data);
}

@imagedestroy($image_data);
@imagedestroy($output_image_data);
?>
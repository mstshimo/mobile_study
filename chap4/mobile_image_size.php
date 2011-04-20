<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
#error_reporting(E_ALL);

ini_set('display_errors', '1');

require_once 'Net/UserAgent/Mobile.php';

// 画像保存先
$image_path = '/var/www/html/mobile/chap4/image/';

// 画像名を取得する
if(isset($_GET['image_name']) && !empty($_GET['image_name'])){
	$image_name = $_GET['image_name'];
}else{
	header('HTTP/10. 204 No Content');
	exit();
}

// 画像の存在チェック
$image_file = $image_path . $image_name;
if(!file_exists($image_file)){
	header('HTTP/10. 204 No Content');
	exit();
}

//指定された画像の拡張子を確認する。
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

// 携帯キャリア判定
$agent = Net_UserAgent_Mobile::factory();

// 携帯に出力する画像形式を決定する
$output_image_type = $image_type;

if($agent->isDoCoMo()){
	if(! $agent->isFOMA()){
		$ouput_image_type = 'gif';
	}else{
		// png画像ならば、gifに変換
		if(strcmp($image_type, 'png') == 0){
			$output_image_type = 'gif';
		}
	}
}else if($agent->isEZweb()){
	// WAP2.0でなければ、pngに変換
	if(!$agent->isWAP2()){
		$output_image_type = 'png';
	}

}else if($agent->isSoftBank()){
	// W型もしくは3GC型でなければ、png画像に変換
	if(!$agent->isTypeW() && !$agent->isType3GC()){
		$output_image_type = 'png';
	}
}

// 携帯の画像サイズを取得する
$display = $agent->getDisplay();

// ブラウザ表示可能ピクセル
$view_x = $display->getWidth();

if(empty($view_x)){
	// デフォルト設定
	$view_x = '240';
}

$view_y = $display->getHeight();
if(empty($view_y)){
	// デフォルト設定
	$view_y = '320';
}


// 画像を開く
if(strcmp($output_image_type, 'jpg') == 0){
	$image_data = @imagecreatefromjpeg($image_file);
}else if(strcmp($output_image_type, 'gif') == 0){
	$image_data = @imagecreatefromgif($image_file);
}else{
	$image_data = @imagecreatefrompng($image_file);
}

// 読み込んだ画像のサイズ取得
$image_x = @imagesx($image_data);
$image_y = @imagesy($image_data);

// アスペクト比を保ったまま出力する画像サイズを決定する
$output_image_x = $image_x;
$output_image_y = $image_y;

// リサイズ
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

// ファイル読み込み
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


// 出力画像を作成する
if(strcmp($output_image_type, 'jpg') == 0){
	// 綺麗な画像
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

	// 綺麗な画像
	$output_image_data = @imagecreatetruecolor($output_image_x, $output_image_y);
	@imagecopyresampled($output_image_data, $image_data, 0, 0, 0, 0, $output_image_x, $output_image_y, $image_x, $image_y);
	header('Content-Type: image/png');
	@imagepng($output_image_data);
}

@imagedestroy($image_data);
@imagedestroy($output_image_data);
?>
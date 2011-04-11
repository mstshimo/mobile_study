<?php
# EUC CRLF

error_reporting(E_ALL);
ini_set('display_errors', '1');


// Net_UserAgent_Mobile
require_once('Net/UserAgent/Mobile.php');

function mobile_useragent_carrier(){
	// Net_UserAgent_Mobileをインスタンス化する

	$agent = Net_UserAgent_Mobile::factory();

	// 端末情報
	$mobaile_data = array();

	// キャリア
	$carrier;

	// 機種名を取得
	$model = $agent->getModel();

	// ブラウザタイプ
	$type;

	// キャリアチェック
	if($agent->isDocomo()){
		// docomo
		$mobile_data['carrier'] = 'docomo';

		// 機種名
		$mobile_data['model'] = $agent->getModel();

		// imode HTMLバージョン
		$mobile_data['html_version'] = $agent->getHTMLVersion();

		// ブラウザのキャッシュサイズ
		$mobile_data['cache_size'] = $agent->getCacheSize();

		// シリーズ
		$mobile_data['series'] = $agent->getSeries();

		// ベンダー
		$mobile_data['vendor'] = $agent->getVendor();

		// 通信ステータス
		$mobile_data['status'] = $agent->getStatus();

		// FOMA?
		$mobile_data['foma'] = $agent->isFOMA();

		if($agent->isFOMA()){
			// FOMA
			// FOMAカードの製造番号
			$mobile_data['card_id'] = $agent->getCardID();

			// FOMA端末製造番号
			$mobile_data['serial_number'] = $agent->getSerialNumber();
		}else{
			// mova
			// 端末製造番号
			$mobile_data[''] = $agent->getSerialNumber();
		}

		// i-modeID
		$mobile_data['imode_id'] = $_SERVER['HTTP_X_DCMGUID'];


		/*
		$carrier = 'docomo';
		$type =$agent->getHTMLVersion();
		*/
		
	}else if($agent->isEZWeb()){
		// au

		$mobile_data['carrier'] = 'au';

		// auはデバイス名しかとれない
		// デバイス名から機種名を紐づかせるしかない。別途データ必要。
		$mobile_data['model'] = $agent->getModel();

		// XHTML対応か？
		$mobile_data['xhtml'] = $agent->isXHTMLCompliant();

		// WINか？
		$mobile_data['win'] = $agent->isWIN();

		// auユーザID(サブスクライバID)
		$mobile_data['subno'] = $_SERVER['HTTP_X_UP_SUBNO'];


		$mobile_data['xhtml'] =  $agent->isXHTMLCompliant();


		$mobile_data['win'] =  $agent->isWIN();


		//$carrier = 'au';

		// ブラウザタイプ
		if($agent->isWAP2()){
			$type = 'wap2.0';
			$mobile_data['type'] = $type;

		}else{
			// HDMLタイプ
			$type = 'hdml';
			$mobile_data['type'] = $type;
		}

	}else if($agent->isSoftBank()){
		// softbank

		// キャリア名
		$mobile_data['carrier'] = 'softbank';

		// 機種名
		$mobile_data['model'] = $agent->getModel();

		// ベンダー
		$mobile_data['vendor'] = $agent->getVendor();

		// ブラウザタイプ
		$mobile_data['type'];
		if($agent->isTypeC()){
			$mobile_data['type'] = 'c';
		}else if($agent->isTypeP()){
			$$mobile_data['type']= 'p';
		}else if($agent->isTypeW()){
			$mobile_data['type']= 'w';
		}else if($agent->isType3GC()){
			$mobile_data['type'] = '3gc';
		}

		// softbankシリアル番号
		$mobile_data['serial_number'] = $agent->getSerialNumber();

		// ユーザID
		$mobile_data['uid'] = $_SERVER['HTTP_X_JPHONE_UID'];

		/*
		$carrier = 'softbank';

		// ブラウザタイプ
		if($agent->isTypeC()){
			$type = 'c';
		}else if($agent->isTypeP()){
			$type = 'p';
		}else if($agent->isTypeW()){
			$type = 'w';
		}else if($agent->isType3GC()){
			$type = '3gc';
		}
		*/
	}else if($agent->isWillcom()){

	}else{
		$mobile_data['carrier'] = 'pc';
		$mobile_data['model'] = 'Could not get the model.';
		$mobile_data['type'] = "Could not get the type.";

		/*
		// その他のキャリア
		$carrier = "PC.";
		$model = "Could not get the model.";
		$type = "Could not get the type.";
		*/
	}

	$display = $agent->getDisplay();

	$mobile_data['width'] = $display->getWidth();

	$mobile_data['height'] = $display->getHeight();

	$mobile_data['depth'] = $display->getDepth();

	return $mobile_data;
	/*
	$output = array($carrier, $model, $type);
	return $output;
	*/
}


?>
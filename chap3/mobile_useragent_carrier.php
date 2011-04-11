<?php
# EUC CRLF

error_reporting(E_ALL);
ini_set('display_errors', '1');


// Net_UserAgent_Mobile
require_once('Net/UserAgent/Mobile.php');

function mobile_useragent_carrier(){
	// Net_UserAgent_Mobile�򥤥󥹥��󥹲�����

	$agent = Net_UserAgent_Mobile::factory();

	// ü������
	$mobaile_data = array();

	// ����ꥢ
	$carrier;

	// ����̾�����
	$model = $agent->getModel();

	// �֥饦��������
	$type;

	// ����ꥢ�����å�
	if($agent->isDocomo()){
		// docomo
		$mobile_data['carrier'] = 'docomo';

		// ����̾
		$mobile_data['model'] = $agent->getModel();

		// imode HTML�С������
		$mobile_data['html_version'] = $agent->getHTMLVersion();

		// �֥饦���Υ���å��奵����
		$mobile_data['cache_size'] = $agent->getCacheSize();

		// ���꡼��
		$mobile_data['series'] = $agent->getSeries();

		// �٥����
		$mobile_data['vendor'] = $agent->getVendor();

		// �̿����ơ�����
		$mobile_data['status'] = $agent->getStatus();

		// FOMA?
		$mobile_data['foma'] = $agent->isFOMA();

		if($agent->isFOMA()){
			// FOMA
			// FOMA�����ɤ���¤�ֹ�
			$mobile_data['card_id'] = $agent->getCardID();

			// FOMAü����¤�ֹ�
			$mobile_data['serial_number'] = $agent->getSerialNumber();
		}else{
			// mova
			// ü����¤�ֹ�
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

		// au�ϥǥХ���̾�����Ȥ�ʤ�
		// �ǥХ���̾���鵡��̾��ɳ�Ť����뤷���ʤ������ӥǡ���ɬ�ס�
		$mobile_data['model'] = $agent->getModel();

		// XHTML�б�����
		$mobile_data['xhtml'] = $agent->isXHTMLCompliant();

		// WIN����
		$mobile_data['win'] = $agent->isWIN();

		// au�桼��ID(���֥����饤��ID)
		$mobile_data['subno'] = $_SERVER['HTTP_X_UP_SUBNO'];


		$mobile_data['xhtml'] =  $agent->isXHTMLCompliant();


		$mobile_data['win'] =  $agent->isWIN();


		//$carrier = 'au';

		// �֥饦��������
		if($agent->isWAP2()){
			$type = 'wap2.0';
			$mobile_data['type'] = $type;

		}else{
			// HDML������
			$type = 'hdml';
			$mobile_data['type'] = $type;
		}

	}else if($agent->isSoftBank()){
		// softbank

		// ����ꥢ̾
		$mobile_data['carrier'] = 'softbank';

		// ����̾
		$mobile_data['model'] = $agent->getModel();

		// �٥����
		$mobile_data['vendor'] = $agent->getVendor();

		// �֥饦��������
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

		// softbank���ꥢ���ֹ�
		$mobile_data['serial_number'] = $agent->getSerialNumber();

		// �桼��ID
		$mobile_data['uid'] = $_SERVER['HTTP_X_JPHONE_UID'];

		/*
		$carrier = 'softbank';

		// �֥饦��������
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
		// ����¾�Υ���ꥢ
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
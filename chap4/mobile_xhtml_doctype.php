<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


// Net_UserAgent_Mobile
require_once('Net/UserAgent/Mobile.php');

// docomo
define("DOCOMO_1_DOCTYPE", '<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/1.0) 1.0//EN" "i-xhtml_4ja_10.dtd">');

define("DOCOMO_1_1_DOCTYPE", '<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/1.1) 1.0//EN" "i-xhtml_4ja_10.dtd">');

define("DOCOMO_2_0_DOCTYPE", '<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/2.0) 1.0//EN" "i-xhtml_4ja_10.dtd">');

define("DOCOMO_2_1_DOCTYPE", '<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/2.1) 1.0//EN" "i-xhtml_4ja_10.dtd">');

define("DOCOMO_2_2_DOCTYPE", '<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/2.2) 1.0//EN" "i-xhtml_4ja_10.dtd">');

define("DOCOMO_2_3_DOCTYPE", '<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/2.3) 1.0//EN" "i-xhtml_4ja_10.dtd">');

// au
define("AU_DOCTYPE", '<!DOCTYPE html PUBLIC "-//OPENWAVE//DTD XHTML 1.0//EN" "http://www.openwave.com/DTD/xhtml-basic.dtd">');

// softbank
define("SOFTBANK_DOCTYPE", '<!DOCTYPE html PUBLIC "-//J-PHONE//DTD XHTML Basic 1.0 Plus//EN" "xhtml-basic10-plus.dtd">');

function mobile_xhtml_doctype(){
	$doctype = '';

	$agent = Net_UserAgent_Mobile::factory();

	if($agent->isDoCoMo()){

		$type = $agent->getHTMLVersion();

		if($agent->isFOMA()){
			if(srcmp($type, "4.0") == 0){
				// html ver4 ¤Ï¡¢ xhtml1.0
				$doctype = constant("DOCOMO_1_DOCTYPE");
			}else if(srcmp($type, "5.0") == 0){
				$doctype = constant("DOCOMO_1_1_DOCTYPE");

			}else if(srcmp($type, "6.0") == 0){
				$doctype = constant("DOCOMO_2_0_DOCTYPE");

			}else if(srcmp($type, "7.0") == 0){
				$doctype = constant("DOCOMO_2_1_DOCTYPE");

			}else if(srcmp($type, "7.1") == 0){
				$doctype = constant("DOCOMO_2_2_DOCTYPE");

			}else if(srcmp($type, "7.2") == 0){
				$doctype = constant("DOCOMO_2_3_DOCTYPE");

			}
		}
	}else if($agent->isWAP2()){
		$doctype = constant("AU_DOCTYPE");

	}else if($agent->isSoftBank()){

		if($agent->isTypeW() || $agent->isType3GC()){
			$doctype = constant("SOFTBANK_DOCTYPE");
		}

	}

	return $doctype;

}

?>

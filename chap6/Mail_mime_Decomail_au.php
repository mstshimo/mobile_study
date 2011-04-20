<?php
require_once 'Mail_mime_Decomail.php';

class Mail_mime_Decomail_au extends Mail_mime_Decomail{

	function Mail_mime_Decomail_au($crlf){
		parent::Mail_mime_Decomail($crlf);
	}

	function addHTMLImage($file, $c_type='application/octet-stream', $name = '', $isfile = true, $content_id = null) {
		$bodyfile = null;

	if ($isfile) {
		if ($this->_build_params['delay_file_io']) {
			$filedata = null;
			$bodyfile = $file;

		} else {
			if (PEAR::isError($filedata = $this->_file2str($file))) {
				return $filedata;
			}
		}
			$filename = ($name ? $name : $file);
		} else {
			$filedata = $file;
			$filename = $name;
		}

		if (!$content_id) {
			$content_id = md5(uniqid(time())) . '@msworks.homelinux.com';
		}

		$this->_html_images[] = array(
			'body'      => $filedata,
			'body_file' => $bodyfile,
			'name'      => $filename,
			'c_type'    => $c_type,
			'cid'       => $content_id
		);

		return true;
	}
}
?>
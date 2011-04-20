<?php
/**
 * �ǥ��᡼������ MIME���󥳡��ɥ��饹.
 * PEAR Mail_mime ��Ѿ�.
 * 
 * @package mail
 * @author y-110 <m@y-110.net>
 * @since 2005/10/22
 * @version $Id$
 *
 * Y-110's wiki: <http://php.y-110.net/wiki/>
 */
require_once "Mail/mime.php";

class Mail_Mime_Decomail extends Mail_mime
{
    /**
     * Constructor
     */
    function Mail_Mime_Decomail($crlf = "\r\n")
    {
        parent::Mail_mime($crlf);
    }

    /**
     * Override Mail_mime::_addHtmlImagePart
     */
    function &_addHtmlImagePart(&$obj, $value)
    {
        // image/xxx; name=xxx ���ͤ� name=xxx ���դ��ʤ��Ȳ�����ɽ������ʤ�
        $params['content_type'] = $value['c_type']. ";\r\n name=\"${value['name']}\"";
        $params['encoding']     = 'base64';
        $params['cid']          = $value['cid'];
        $obj->addSubpart($value['body'], $params);
    }
    
    /**
     * Override Mail_mime::get
     *
     * �ǥ���Υ���饤������ξ����б�
     *
     * multipart/related
     * �� multipart/alternative
     * �� �� text/plain
     * �� �� text/html
     * �� image/xxx (*n)
     */
    function &get($build_params = null)
    {
        if (isset($build_params)) {
            while (list($key, $value) = each($build_params)) {
                $this->_build_params[$key] = $value;
            }
        }

        if (!empty($this->_html_images) AND isset($this->_htmlbody)) {
            foreach ($this->_html_images as $value) {
                $regex = '#(\s)((?i)src|background|href(?-i))\s*=\s*(["\']?)' . preg_quote($value['name'], '#') .
                         '\3#';
                $rep = '\1\2=\3cid:' . $value['cid'] .'\3';
                $this->_htmlbody = preg_replace($regex, $rep,
                                       $this->_htmlbody
                                   );
            }
        }

        $null        = null;
        $attachments = !empty($this->_parts)                ? true : false;
        $html_images = !empty($this->_html_images)          ? true : false;
        $html        = !empty($this->_htmlbody)             ? true : false;
        $text        = (!$html AND !empty($this->_txtbody)) ? true : false;

        switch (true) {
        // �ǥ��᡼����ʸ�Τ�
        case $html AND !$attachments AND !$html_images:
            if (isset($this->_txtbody)) {
                $message =& $this->_addAlternativePart($null);
                $this->_addTextPart($message, $this->_txtbody);
                $this->_addHtmlPart($message);
            } else {
                $message =& $this->_addHtmlPart($null);
            }
            break;
        // �ǥ��᡼����ʸ�ȥ���饤�����
        case $html AND !$attachments AND $html_images:
            if (isset($this->_txtbody)) {
                $message =& $this->_addRelatedPart($null);
                $alt =& $this->_addAlternativePart($message);
                $this->_addTextPart($alt, $this->_txtbody);
            } else {
                die("no text part");
            }
            $this->_addHtmlPart($alt);
            for ($i = 0; $i < count($this->_html_images); $i++) {
                $this->_addHtmlImagePart($message, $this->_html_images[$i]);
            }
            break;
        // �ǥ��᡼����ʸ��ź�ղ���
        case $html AND $attachments AND !$html_images:
            $message =& $this->_addMixedPart();
            if (isset($this->_txtbody)) {
                $alt =& $this->_addAlternativePart($message);
                $this->_addTextPart($alt, $this->_txtbody);
                $this->_addHtmlPart($alt);
            } else {
                die("no text part");
            }
            for ($i = 0; $i < count($this->_parts); $i++) {
                $this->_addAttachmentPart($message, $this->_parts[$i]);
            }
            break;
        // �ǥ��᡼����ʸ��ź�ղ����ȥ���饤�����
        case $html AND $attachments AND $html_images:
            $message =& $this->_addMixedPart();
            if (isset($this->_txtbody)) {
                $message =& $this->_addRelatedPart($null);
                $alt =& $this->_addAlternativePart($message);
                $this->_addTextPart($alt, $this->_txtbody);
            } else {
                die("no text part");
            }
            $this->_addHtmlPart($alt);
            for ($i = 0; $i < count($this->_html_images); $i++) {
                $this->_addHtmlImagePart($message, $this->_html_images[$i]);
            }
            for ($i = 0; $i < count($this->_parts); $i++) {
                $this->_addAttachmentPart($message, $this->_parts[$i]);
            }
            break;

        default:
            // setHTMLBody ����Ƥ��ʤ��ȥǥ��᡼��Ȥߤʤ������顼
            die("not decomail.");
            break;
        }

        if (isset($message)) {
            $output = $message->encode();
            $this->_headers = array_merge($this->_headers,
                                          $output['headers']);
            return $output['body'];

        } else {
            return false;
        }
    }
}
?>

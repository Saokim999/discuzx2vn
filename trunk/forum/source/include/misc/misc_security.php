<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: misc_security.php 20931 2011-03-08 10:34:52Z cnteacher $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

global $_G;

if(is_string($this->config['security']['attackevasive'])) {
	$attackevasive_tmp = explode('|', $this->config['security']['attackevasive']);
	$attackevasive = 0;
	foreach($attackevasive_tmp AS $key => $value) {
		$attackevasive += intval($value);
	}
	unset($attackevasive_tmp);
} else {
	$attackevasive = $this->config['security']['attackevasive'];
}

$lastrequest = isset($_G['cookie']['lastrequest']) ? authcode($_G['cookie']['lastrequest'], 'DECODE') : '';

if($attackevasive & 1 || $attackevasive & 4) {
	dsetcookie('lastrequest', authcode(TIMESTAMP, 'ENCODE'), TIMESTAMP + 816400, 1, true);
}

if($attackevasive & 1) {
	if(TIMESTAMP - $lastrequest < 1) {
		securitymessage('attackevasive_1_subject', 'attackevasive_1_message');
	}
}

if(($attackevasive & 2) && ($_SERVER['HTTP_X_FORWARDED_FOR'] ||
	$_SERVER['HTTP_VIA'] || $_SERVER['HTTP_PROXY_CONNECTION'] ||
	$_SERVER['HTTP_USER_AGENT_VIA'] || $_SERVER['HTTP_CACHE_INFO'] ||
	$_SERVER['HTTP_PROXY_CONNECTION'])) {
		securitymessage('attackevasive_2_subject', 'attackevasive_2_message', FALSE);
}

if($attackevasive & 4) {
	if(empty($lastrequest) || TIMESTAMP - $lastrequest > 300) {
		securitymessage('attackevasive_4_subject', 'attackevasive_4_message');
	}
}

if($attackevasive & 8) {
	list($visitcode, $visitcheck, $visittime) = explode('|', authcode($_G['cookie']['visitcode'], 'DECODE'));
	if(!$visitcode || !$visitcheck || !$visittime || TIMESTAMP - $visittime > 60 * 60 * 4 ) {
		if(empty($_POST['secqsubmit']) || ($visitcode != md5($_POST['answer']))) {
			$answer = 0;
			$question = '';
			for ($i = 0; $i< rand(2, 5); $i ++) {
				$r = rand(1, 20);
				$question .= $question ? ' + '.$r : $r;
				$answer += $r;
			}
			$question .= ' = ?';
			dsetcookie('visitcode', authcode(md5($answer).'|0|'.TIMESTAMP, 'ENCODE'), TIMESTAMP + 816400, 1, true);
			securitymessage($question, '<input type="text" name="answer" size="8" maxlength="150" /><input type="submit" name="secqsubmit" class="button" value=" Submit " />', FALSE, TRUE);
		} else {
			dsetcookie('visitcode', authcode($visitcode.'|1|'.TIMESTAMP, 'ENCODE'), TIMESTAMP + 816400, 1, true);
		}
	}

}

function securitymessage($subject, $message, $reload = TRUE, $form = FALSE) {
	global $_G;
	$scuritylang = array(
		'attackevasive_1_subject' => 'H&#7841;n ch&#7871; th&#432;&#7901;ng xuyên làm m&#7899;i',
		'attackevasive_1_message' => 'B&#7841;n truy c&#7853;p vào trang web quá nhanh ho&#7863;c th&#7901;i gian làm m&#7899;i kho&#7843;ng ch&#432;a &#273;&#7847;y hai giây! Vui lòng ch&#7901; ...',
		'attackevasive_2_subject' => 'Gi&#7899;i h&#7841;n truy c&#7853;p Proxy server',
		'attackevasive_2_message' => 'H&#7841;n ch&#7871; vi&#7879;c s&#7917; d&#7909;ng m&#7897;t trang web máy ch&#7911; proxy &#273;&#7875; truy c&#7853;p, lo&#7841;i b&#7887; các thi&#7871;t l&#7853;p proxy c&#7911;a b&#7841;n, truy c&#7853;p tr&#7921;c ti&#7871;p vào trang web.',
		'attackevasive_4_subject' => 'M&#7903; t&#7843;i l&#7841;i trang',
		'attackevasive_4_message' => 'Chào m&#7915;ng &#273;&#7871;n v&#7899;i trang web, trang &#273;&#432;&#7907;c n&#7841;p l&#7841;i, xin vui lòng ch&#7901; ...'
	);

	$subject = $scuritylang[$subject] ? $scuritylang[$subject] : $subject;
	$message = $scuritylang[$message] ? $scuritylang[$message] : $message;
	if($_GET['inajax']) {
		security_ajaxshowheader();
		echo '<div id="attackevasive_1" class="popupmenu_option"><b style="font-size: 16px">'.$subject.'</b><br /><br />'.$message.'</div>';
		security_ajaxshowfooter();
	} else {
		echo '<html>';
		echo '<head>';
		echo '<title>'.$subject.'</title>';
		echo '</head>';
		echo '<body bgcolor="#FFFFFF">';
		if($reload) {
			echo '<script language="JavaScript">';
			echo 'function reload() {';
			echo '	document.location.reload();';
			echo '}';
			echo 'setTimeout("reload()", 1001);';
			echo '</script>';
		}
		if($form) {
			echo '<form action="'.$G['PHP_SELF'].'" method="post" autocomplete="off">';
		}
		echo '<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" height="85%">';
		echo '  <tr align="center" valign="middle">';
		echo '    <td>';
		echo '    <table cellpadding="10" cellspacing="0" border="0" width="80%" align="center" style="font-family: Verdana, Tahoma; color: #666666; font-size: 11px">';
		echo '    <tr>';
		echo '      <td valign="middle" align="center" bgcolor="#EBEBEB">';
		echo '     	<br /><br /> <b style="font-size: 16px">'.$subject.'</b> <br /><br />';
		echo $message;
		echo '        <br /><br />';
		echo '      </td>';
		echo '    </tr>';
		echo '    </table>';
		echo '    </td>';
		echo '  </tr>';
		echo '</table>';
		if($form) {
			echo '</form>';
		}
		echo '</body>';
		echo '</html>';
	}
	exit();
}


function security_ajaxshowheader() {
	$charset = getglobal('config/output/charset');
	ob_end_clean();
	@header("Expires: -1");
	@header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);
	@header("Pragma: no-cache");
	header("Content-type: application/xml");
	echo "<?xml version=\"1.0\" encoding=\"".$charset."\"?>\n<root><![CDATA[";
}

function security_ajaxshowfooter() {
	echo ']]></root>';
	exit();
}

?>
<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_cloud.php 23076 2011-06-16 13:00:28Z zhouguoqiang $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function openCloud() {
	global $_G;

	require_once libfile('function/cache');

	$result = DB::insert('common_setting', array('skey' => 'cloud_status', 'svalue' => '1'), false, true);
	updatecache('setting');

	if(!empty($_G['setting']['connectsiteid']) || !empty($_G['setting']['connectsitekey']) || !empty($_G['setting']['my_siteid_old']) || !empty($_G['setting']['my_sitekey_sign_old'])) {
		DB::delete('common_setting', "`skey` = 'connectsiteid' OR `skey` = 'connectsitekey' OR `skey` = 'my_siteid_old' OR `skey` = 'my_sitekey_sign_old'");
	}

	return $result;
}

function checkcloudstatus($showMessage = true) {
	global $_G;

	$res = false;

	$cloudStatus = $_G['setting']['cloud_status'];
	$site_id = $_G['setting']['my_siteid'];
	$site_key = $_G['setting']['my_sitekey'];

	if($site_id && $site_key) {
		switch($cloudStatus) {
		case 1:
			$res = 'cloud';
			break;
		case 2:
			$res = 'unconfirmed';
			break;
		default:
			$res = 'upgrade';
		}
	} elseif(!$cloudStatus && !$site_id && !$site_key) {
		$res = 'register';
	} elseif($showMessage) {
		if(defined('IN_ADMINCP')) {
			cpmsg_error('cloud_status_error');
		} else {
			showmessage('cloud_status_error');
		}
	}

	return $res;
}

function generateSiteSignUrl($params = array(), $isEncode = true, $isCamelCase = false) {
	global $_G;

	$ts = TIMESTAMP;
	$sId = $_G['setting']['my_siteid'];
	$sKey = $_G['setting']['my_sitekey'];
	$uid = $_G['uid'];

	if(!is_array($params)) {
		$params = array();
	}

	unset($params['sig'], $params['ts']);

	if ($isCamelCase) {
		$params['sId'] = $sId;
		$params['sSiteUid'] = $uid;
	} else {
		$params['s_id'] = $sId;
		$params['s_site_uid'] = $uid;
	}

	ksort($params);

	$str = buildArrayQuery($params, '', $isEncode);
	$sig = md5(sprintf('%s|%s|%s', $str, $sKey, $ts));

	$params['ts'] = $ts;
	$params['sig'] = $sig;

	$url = buildArrayQuery($params, '', $isEncode);
	return $url;
}

function registercloud($cloudApiIp = '') {
	global $_G;

	require_once DISCUZ_ROOT.'/api/manyou/Manyou.php';

	$cloudClient = new Discuz_Cloud_Client();
	$returnData = $cloudClient->register();

	if($cloudClient->errno == 1 && $cloudApiIp) {
		$cloudClient->setCloudIp($cloudApiIp);
		$returnData = $cloudClient->register();
		if (!$cloudClient->errno) {
			DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`)
						VALUES ('cloud_api_ip', '$cloudApiIp')");
		}
	}

	if($cloudClient->errno) {
		$result = array('errCode' => $cloudClient->errno, 'errMessage' => $cloudClient->errmsg);
	} else {
		$sId = intval($returnData['sId']);
		$sKey = $returnData['sKey'];

		if ($sId && $sKey) {
			DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`)
						VALUES ('my_siteid', '$sId'), ('my_sitekey', '$sKey'), ('cloud_status', '2')");
			updatecache('setting');

			$result = array('errCode' => 0);
		} else {
			$result = array('errCode' => 2);
		}
	}

	return $result;
}

function upgrademanyou($cloudApiIp = '') {
	global $_G;

	require_once DISCUZ_ROOT.'/api/manyou/Manyou.php';

	$cloudClient = new Discuz_Cloud_Client();
	$returnData = $cloudClient->sync();

	if($cloudClient->errno == 1 && $cloudApiIp) {
		$cloudClient->setCloudIp($cloudApiIp);
		$returnData = $cloudClient->sync();
		if (!$cloudClient->errno) {
			DB::query("REPLACE INTO ".DB::table('common_setting')." (`skey`, `svalue`)
						VALUES ('cloud_api_ip', '$cloudApiIp')");
		}
	}

	if($cloudClient->errno) {
		$result = array('errCode' => $cloudClient->errno, 'errMessage' => $cloudClient->errmsg);
	} else {
		$result = array('errCode' => 0);
	}

	return $result;
}

function getcloudapps($usecache = true) {
	global $_G;

	$apps = array();

	if($usecache) {
		$apps = $_G['setting']['cloud_apps'];
	} else {
		$apps = DB::result_first("SELECT svalue FROM ".DB::table('common_setting')." WHERE skey='cloud_apps'");
	}

	if($apps && !is_array($apps)) {
		$apps = unserialize($apps);
	}
	if(!$apps) {
		$apps = array();
	}

	return $apps;
}

function getcloudappstatus($appName, $usecache = true) {

	$res = false;

	$apps = getcloudapps($usecache);
	if($apps && $apps[$appName]) {
		$res = ($apps[$appName]['status'] == 'normal');
	}

	return $res;
}

function setcloudappstatus($appName, $status, $usecache = true, $updatecache = true) {

	$method = 'setcloudappstatus_'.$appName;
	if(!function_exists($method)) {
		return false;
	}

	if(!@call_user_func($method, $appName, $status)) {
		return false;
	}

	$apps = getcloudapps($usecache);

	$app = array('name' => $appName, 'status' => $status);

	$apps[$appName] = $app;
	$apps = addslashes(serialize($apps));

	$res = DB::insert('common_setting', array('skey' => 'cloud_apps', 'svalue' => $apps), false, true);

	if(!empty($updatecache)) {
		require_once libfile('function/cache');
		updatecache(array('plugin', 'setting', 'styles'));
	}

	return $res;
}

function setcloudappstatus_manyou($appName, $status) {

	$available = 0;
	if($status == 'normal') {
		$available = 1;
	}
	$res = DB::insert('common_setting', array('skey' => 'my_app_status', 'svalue' => $available), false, true);

	return $res;
}

function setcloudappstatus_connect($appName, $status) {

	$available = 0;
	if($status == 'normal') {
		$available = 1;
	}
	$connect_setting = DB::result_first("SELECT svalue FROM ".DB::table('common_setting')." WHERE skey='connect'");
	if($connect_setting && !is_array($connect_setting)) {
		$connect_setting = unserialize($connect_setting);
	}
	if(!$connect_setting) {
		$connect_setting = array();
	}
	$connect_setting['allow'] = $available;

	$connectnew = addslashes(serialize($connect_setting));
	$res = DB::insert('common_setting', array('skey' => 'connect', 'svalue' => $connectnew), false, true);

	if(!updatecloudpluginavailable('qqconnect', $available)) {
		return false;
	}

	return $res;
}

function setcloudappstatus_security($appName, $status) {

	return true;
}

function setcloudappstatus_stats($appName, $status) {
	$available = 0;
	if($status == 'normal') {
		$available = 1;
	}

	if(!updatecloudpluginavailable('cloudstat', $available)) {
		return false;
	}

	return true;
}

function setcloudappstatus_search($appName, $status) {

	$available = 0;
	if($status == 'normal') {
		$available = 1;
	}
	$res = DB::insert('common_setting', array('skey' => 'my_search_status', 'svalue' => $available), false, true);
	if($available) {
		require_once DISCUZ_ROOT.'./api/manyou/Manyou.php';
		SearchHelper::allowSearchForum();
	}

	return $res;
}

function setcloudappstatus_smilies($appName, $status) {

	$available = 0;
	if($status == 'normal') {
		$available = 1;
	}

	if(!updatecloudpluginavailable('soso_smilies', $available)) {
		return false;
	}

	return true;
}

function setcloudappstatus_qqgroup($appName, $status) {

	return true;
}

function setcloudappstatus_union($appName, $status) {

	return true;
}

function updatecloudpluginavailable($identifier, $available) {

	$available = intval($available);
	$identifier = addslashes(strval($identifier));
	$pluginId = DB::result_first("SELECT pluginid FROM ".DB::table('common_plugin')." WHERE identifier='$identifier'");
	if($pluginId) {
		DB::update('common_plugin', array('available' => $available), array('pluginid' => $pluginId));
	} else {
		return false;
	}

	return true;
}

function headerLocation($url) {
	ob_end_clean();
	ob_start();
	@header('location: '.$url);
	exit;
}

function buildArrayQuery($data, $key = '', $isEncode = false) {

	if ($key) {
		$query =  array($key => $data);
	} else {
		$query = $data;
	}

	if ($isEncode) {
		return cloud_http_build_query($query, '', '&');
	} else {
		return cloud_http_build_query($query);
	}
}

function cloud_http_build_query($data, $numeric_prefix='', $arg_separator='', $prefix='') {
	$render = array();
	if (empty($arg_separator)) {
		$arg_separator = @ini_get('arg_separator.output');
		empty($arg_separator) && $arg_separator = '&';
	}
	foreach ((array) $data as $key => $val) {
		if (is_array($val) || is_object($val)) {
			$_key = empty($prefix) ? "{$key}[%s]" : sprintf($prefix, $key) . "[%s]";
			$_render = cloud_http_build_query($val, '', $arg_separator, $_key);
			if (!empty($_render)) {
				$render[] = $_render;
			}
		} else {
			if (is_numeric($key) && empty($prefix)) {
				$render[] = urlencode("{$numeric_prefix}{$key}") . "=" . urlencode($val);
			} else {
				if (!empty($prefix)) {
					$_key = sprintf($prefix, $key);
					$render[] = urlencode($_key) . "=" . urlencode($val);
				} else {
					$render[] = urlencode($key) . "=" . urlencode($val);
				}
			}
		}
	}
	$render = implode($arg_separator, $render);
	if (empty($render)) {
		$render = '';
	}
	return $render;
}

function cloud_get_api_version() {
	return '0.4';
}

?>
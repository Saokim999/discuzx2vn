<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admin.php 22307 2011-04-29 03:28:32Z monkey $
 */

define('IN_ADMINCP', TRUE);
define('NOROBOT', TRUE);
define('ADMINSCRIPT', basename(__FILE__));
define('CURSCRIPT', 'admin');
define('HOOKTYPE', 'hookscript');
define('APPTYPEID', 0);


require './source/class/class_core.php';
require './source/class/class_admincp.php';
require './source/function/function_misc.php';
require './source/function/function_forum.php';
require './source/function/function_admincp.php';
require './source/function/function_cache.php';

$discuz = & discuz_core::instance();
$discuz->init();

$admincp = new discuz_admincp();
$admincp->core  = & $discuz;
$admincp->init();


$admincp_actions_founder = array('templates', 'db', 'founder', 'postsplit', 'threadsplit');
$admincp_actions_normal = array('index', 'setting', 'members', 'profilefields', 'admingroup', 'usergroups',
	'forums', 'threadtypes', 'threads', 'moderate', 'attach', 'smilies', 'recyclebin', 'recyclebinpost', 'prune',
	'styles', 'addons', 'plugins', 'tasks', 'magics', 'medals', 'google', 'announce', 'faq', 'ec',
	'tradelog', 'jswizard', 'project', 'counter', 'misc', 'adv', 'logs', 'tools', 'portalperm',
	'checktools', 'search', 'upgrade', 'article', 'block', 'blockstyle', 'blockxml', 'portalcategory', 'blogcategory', 'albumcategory', 'topic', 'credits',
	'doing', 'group', 'blog', 'feed', 'album', 'pic', 'comment', 'share', 'click', 'specialuser', 'postsplit', 'threadsplit', 'report',
	'district', 'diytemplate', 'verify', 'nav', 'domain', 'postcomment', 'tag', 'connect', 'card');

$action = getgpc('action');
$operation = getgpc('operation');
$do = getgpc('do');
$frames = getgpc('frames');
lang('admincp');
$lang = & $_G['lang']['admincp'];
$page = max(1, intval(getgpc('page')));
$isfounder = $admincp->isfounder;

if(empty($action) || $frames != null) {
	$admincp->show_admincp_main();
} elseif($action == 'logout') {
	$admincp->do_admin_logout();
	dheader("Location: ./index.php");
} elseif(in_array($action, $admincp_actions_normal) || ($admincp->isfounder && in_array($action, $admincp_actions_founder))) {
	if($admincp->allow($action, $operation, $do) || $action == 'index') {
		require $admincp->admincpfile($action);
	} else {
		cpheader();
		cpmsg('action_noaccess', '', 'error');
	}
} else {
	cpheader();
	cpmsg('action_noaccess', '', 'error');
}

?>
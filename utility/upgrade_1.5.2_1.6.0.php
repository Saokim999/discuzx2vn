<?php

/*
	[UCenter] (C)2001-2099 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: upgrade_1.5.2_1.6.0.php 1086 2011-04-21 03:17:51Z svn_project_zhangjie $
*/

define("IN_UC", TRUE);
define('UC_ROOT', realpath('.').'/');

$version_old = 'UCenter 1.5.2';
$version_new = 'UCenter 1.6.0';
$lock_file = UC_ROOT.'./data/upgrade.lock';

require UC_ROOT.'./data/config.inc.php';
require UC_ROOT.'./lib/db.class.php';

error_reporting(0);
@set_magic_quotes_runtime(0);
$PHP_SELF = htmlspecialchars($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']);

$action = getgpc('action');
$forward = getgpc('forward');

$sql = <<<EOT
DROP TABLE IF EXISTS uc_pm_members;
CREATE TABLE uc_pm_members (
  plid mediumint(8) unsigned NOT NULL default '0',
  uid mediumint(8) unsigned NOT NULL default '0',
  isnew tinyint(1) unsigned NOT NULL default '0',
  pmnum int(10) unsigned NOT NULL default '0',
  lastupdate int(10) unsigned NOT NULL default '0',
  lastdateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (plid,uid),
  KEY isnew (isnew),
  KEY lastdateline (uid,lastdateline),
  KEY lastupdate (uid,lastupdate)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_lists;
CREATE TABLE uc_pm_lists (
  plid mediumint(8) unsigned NOT NULL auto_increment,
  authorid mediumint(8) unsigned NOT NULL default '0',
  pmtype tinyint(1) unsigned NOT NULL default '0',
  subject varchar(80) NOT NULL,
  members smallint(5) unsigned NOT NULL default '0',
  min_max varchar(17) NOT NULL,
  dateline int(10) unsigned NOT NULL default '0',
  lastmessage text NOT NULL,
  PRIMARY KEY  (plid),
  KEY pmtype (pmtype),
  KEY min_max (min_max),
  KEY authorid (authorid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_indexes;
CREATE TABLE uc_pm_indexes (
  pmid mediumint(8) unsigned NOT NULL auto_increment,
  plid mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_0;
CREATE TABLE uc_pm_messages_0 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_1;
CREATE TABLE uc_pm_messages_1 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_2;
CREATE TABLE uc_pm_messages_2 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_3;
CREATE TABLE uc_pm_messages_3 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_4;
CREATE TABLE uc_pm_messages_4 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_5;
CREATE TABLE uc_pm_messages_5 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_6;
CREATE TABLE uc_pm_messages_6 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_7;
CREATE TABLE uc_pm_messages_7 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_8;
CREATE TABLE uc_pm_messages_8 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

DROP TABLE IF EXISTS uc_pm_messages_9;
CREATE TABLE uc_pm_messages_9 (
  pmid mediumint(8) unsigned NOT NULL default '0',
  plid mediumint(8) unsigned NOT NULL default '0',
  authorid mediumint(8) unsigned NOT NULL default '0',
  message text NOT NULL,
  delstatus tinyint(1) unsigned NOT NULL default '0',
  dateline int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (pmid),
  KEY plid (plid,delstatus,dateline),
  KEY dateline (plid,dateline)
) TYPE=MyISAM;

ALTER TABLE uc_applications ADD COLUMN allowips text NOT NULL;
ALTER TABLE uc_applications CHANGE type type varchar(16) NOT NULL default '';
ALTER TABLE uc_applications CHANGE name name varchar(20) NOT NULL default '';
ALTER TABLE uc_applications CHANGE url url varchar(255) NOT NULL default '';
ALTER TABLE uc_applications CHANGE authkey authkey varchar(255) NOT NULL default '';
ALTER TABLE uc_applications CHANGE ip ip varchar(15) NOT NULL default '';
ALTER TABLE uc_applications CHANGE viewprourl viewprourl varchar(255) NOT NULL default '';
ALTER TABLE uc_applications CHANGE apifilename apifilename varchar(30) NOT NULL default 'uc.php';
ALTER TABLE uc_applications CHANGE charset charset varchar(8) NOT NULL default '';
ALTER TABLE uc_applications CHANGE dbcharset dbcharset varchar(8) NOT NULL default '';
ALTER TABLE uc_applications CHANGE extra extra text NOT NULL;
ALTER TABLE uc_applications CHANGE tagtemplates tagtemplates text NOT NULL;

REPLACE INTO uc_settings (k, v) VALUES ('privatepmthreadlimit','25');
REPLACE INTO uc_settings (k, v) VALUES ('chatpmthreadlimit','30');
REPLACE INTO uc_settings (k, v) VALUES ('chatpmmemberlimit','35');
REPLACE INTO uc_settings (k, v) VALUES ('version','1.6.0');
EOT;

if(file_exists($lock_file)) {
	showheader();
	showerror('Nâng cấp bị khóa, kiểm tra lockfile nếu có hãy xóa đi<br />'.str_replace(UC_ROOT, '', $lock_file).'<br />Kiểm tra lại');
	showfooter();
}

if(!$action) {

	showheader();

?>

	<p>Update UCenter 1.5.2 lên UCenter 1.6.0</p>
	<p>Trước khi update, chắc chăn đã upload UCenter 1.6.0 đè lên phiên bản cũ</p>
	<p>Hãy backup dữ liệu trước khi làm</p>
	<p><a href="<?php echo $PHP_SELF;?>?action=db">Ấn vào để nâng cấp</a></p>

<?php
	showfooter();

} elseif($action == 'db') {

	showheader();

	echo "<h4>Cập nhập cấu trúc dữ liệu</h4>";

	@touch(UC_ROOT.'./data/install.lock');
	@unlink(UC_ROOT.'./install/index.php');

	$db = new ucserver_db();
	$db->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBCHARSET);

	runquery($sql);
	dir_clear(UC_ROOT.'./data/view');
	dir_clear(UC_ROOT.'./data/cache');
	if(is_dir(UC_ROOT.'./plugin/setting')) {
		dir_clear(UC_ROOT.'./plugin/setting');
		@unlink(UC_ROOT.'./plugin/setting/index.htm');
		@rmdir(UC_ROOT.'./plugin/setting');
	}

	echo "Xử lý dữ liệu ";
	$url_forward = "upgrade_1.5.2_1.6.0.php?action=pm&forward=".urlencode($forward);
	echo "<br /><br /><br /><a href=\"$url_forward\">Trình duyệt sẽ tự chuyển, Ấn vào nếu đợi lâu</a>";
	echo "<script>setTimeout(\"redirect('$url_forward');\", 1250);</script>";

	showfooter();

} elseif($action == 'pm') {

	showheader();

	echo "<h4>Xử lý dữ liệu</h4>";

	$db = new ucserver_db();
	$db->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBCHARSET);

	$total = getgpc('total');
	$start = getgpc('start') ? getgpc('start') : 0;
	$limit = 1000;
	$next = 0;
	if(!$total) {
		$db->query("truncate table ".UC_DBTABLEPRE."pm_indexes");
		$db->query("truncate table ".UC_DBTABLEPRE."pm_members");
		for($i=0; $i<10; $i++) {
			$db->query("truncate table ".UC_DBTABLEPRE."pm_messages_$i");
		}
		$db->query("truncate table ".UC_DBTABLEPRE."pm_lists");
		$total = $db->result_first("SELECT MAX(pmid) FROM ".UC_DBTABLEPRE."pms WHERE related=1");
	}

	if($total) {
		$query = $db->query("SELECT * FROM ".UC_DBTABLEPRE."pms WHERE pmid>'$start' AND related=1 ORDER BY pmid LIMIT $limit");
		while($data = $db->fetch_array($query)) {
			$next = $data['pmid'];
			if(!$data['msgfromid'] || !$data['msgtoid'] || $data['msgfromid'] == $data['msgtoid']) {
				continue;
			}
			$plid = $founderid = 0;
			$data['msgfrom'] = addslashes($data['msgfrom']);
			$data['subject'] = addslashes($data['subject']);
			$data['message'] = addslashes($data['message']);
			$relationship = relationship($data['msgfromid'], $data['msgtoid']);
			$querythread = $db->query("SELECT plid, authorid FROM ".UC_DBTABLEPRE."pm_lists WHERE min_max='$relationship'");
			if($thread = $db->fetch_array($querythread)) {
				$plid = $thread['plid'];
				$founderid = $thread['authorid'];
			}
			if(!$plid) {
				$db->query("INSERT INTO ".UC_DBTABLEPRE."pm_lists(authorid, pmtype, subject, members, min_max, dateline) VALUES('$data[msgfromid]', 1, '', 2, '$relationship', '$data[dateline]')");
				$plid = $db->insert_id();
				$db->query("INSERT INTO ".UC_DBTABLEPRE."pm_members(plid, uid, isnew, lastupdate) VALUES('$plid', '$data[msgfromid]', 0, 0)");
				$db->query("INSERT INTO ".UC_DBTABLEPRE."pm_members(plid, uid, isnew, lastupdate) VALUES('$plid', '$data[msgtoid]', 0, 0)");
			}
			$db->query("INSERT INTO ".UC_DBTABLEPRE."pm_indexes(plid) VALUES('$plid')");
			$pmid = $db->insert_id();
			if($founderid == $data['msgfromid']) {
				$delstatus = $data['delstatus'];
			} else {
				$delstatus = ($data['delstatus'] == 1) ? 2 : ($data['delstatus'] == 2 ? 1 : 0);
			}
			$db->query("INSERT INTO ".UC_DBTABLEPRE.getposttablename($plid)."(pmid, plid, authorid, message, delstatus, dateline) VALUES('$pmid', '$plid', '$data[msgfromid]', '".$data['message']."', '$delstatus', '$data[dateline]')");
		}
	
		if($next > 0) {
			$end = $next;
			echo "Xử lý $start / $total ...";
			$url_forward = "upgrade_1.5.2_1.6.0.php?action=pm&start=$end&total=$total&forward=".urlencode($forward);
			echo "<br /><br /><br /><a href=\"$url_forward\">Trình duyệt sẽ tự chuyển, Ấn vào nếu đợi lâu</a>";
			echo "<script>setTimeout(\"redirect('$url_forward');\", 1250);</script>";
		} else {
			echo "Xử lý dữ liệu";
			$url_forward = "upgrade_1.5.2_1.6.0.php?action=pmstats&forward=".urlencode($forward);
			echo "<br /><br /><br /><a href=\"$url_forward\">Trình duyệt sẽ tự chuyển, Ấn vào nếu đợi lâu</a>";
			echo "<script>setTimeout(\"redirect('$url_forward');\", 1250);</script>";
		}
	} else {
		@touch($lock_file);
		echo "Nâng cấp hoàn tất<br>Bảng dữ liệu (".UC_DBTABLEPRE."pms ở phiên bản mới không cần xử dụng, cần kiểm tra và xóa bảng này";
	}

	showfooter();

} elseif($action == 'pmstats') {

	showheader();

	echo "<h4>Dữ liệu xử lý PM</h4>";

	$db = new ucserver_db();
	$db->connect(UC_DBHOST, UC_DBUSER, UC_DBPW, UC_DBNAME, UC_DBCHARSET);

	$total = getgpc('total');
	$start = getgpc('start') ? getgpc('start') : 0;
	$limit = 1000;
	$next = 0;
	if(!$total) {
		$total = $db->result_first("SELECT MAX(plid) FROM ".UC_DBTABLEPRE."pm_lists");
	}
	if($total) {
		$query = $db->query("SELECT * FROM ".UC_DBTABLEPRE."pm_lists WHERE plid>'$start' ORDER BY plid LIMIT $limit");
		while($data = $db->fetch_array($query)) {
			$next = $data['plid'];
			$users = explode('_', $data['min_max']);
			$pmsarr = $db->fetch_first("SELECT * FROM ".UC_DBTABLEPRE."pms WHERE msgfromid IN ('$users[0]','$users[1]') AND msgtoid IN ('$users[0]', '$users[1]') ORDER BY dateline DESC LIMIT 1");
			$pmsarr['msgfrom'] = addslashes($pmsarr['msgfrom']);
			$pmsarr['subject'] = addslashes($pmsarr['subject']);
			$pmsarr['message'] = addslashes($pmsarr['message']);
			if($pmsarr['subject'] && strcmp($pmsarr['subject'], $pmsarr['message'])) {
				$pmsarr['message'] = $pmsarr['subject']."\r\n".$pmsarr['message'];
			}
			if($users[0] == $data['authorid']) {
				$touid = $users[1];
			} else {
				$touid = $users[0];
			}
			$lastsummary = removecode(trim($pmsarr['message']), 150);
			$lastmessage = array('lastauthorid' => $pmsarr['msgfromid'], 'lastauthor' => $pmsarr['msgfrom'], 'lastsummary' => $lastsummary);
			$lastmessage = addslashes(serialize($lastmessage));
			$db->query("UPDATE ".UC_DBTABLEPRE."pm_lists SET lastmessage='$lastmessage' WHERE plid='$data[plid]'");
			$db->query("UPDATE ".UC_DBTABLEPRE."pm_members SET lastdateline='$pmsarr[dateline]' WHERE plid='$data[plid]'");

			if($count = $db->result_first("SELECT COUNT(*) FROM ".UC_DBTABLEPRE.getposttablename($data['plid'])." WHERE plid='$data[plid]' AND delstatus IN (0, 1)")) {
				$db->query("UPDATE ".UC_DBTABLEPRE."pm_members SET pmnum='$count' WHERE plid='$data[plid]' AND uid='$touid'");
			} else {
				$db->query("DELETE FROM ".UC_DBTABLEPRE."pm_members WHERE plid='$data[plid]' AND uid='$touid'");
			}
			if($count = $db->result_first("SELECT COUNT(*) FROM ".UC_DBTABLEPRE.getposttablename($data['plid'])." WHERE plid='$data[plid]' AND delstatus IN (0, 2)")) {
				$db->query("UPDATE ".UC_DBTABLEPRE."pm_members SET pmnum='$count' WHERE plid='$data[plid]' AND uid='$data[authorid]'");
			} else {
				$db->query("DELETE FROM ".UC_DBTABLEPRE."pm_members WHERE plid='$data[plid]' AND uid='$data[authorid]'");
			}
		}
	}
	
	if($next > 0) {
		$end = $next;
		echo "Xử lý PM $start / $total ...";
		$url_forward = "upgrade_1.5.2_1.6.0.php?action=pmstats&start=$end&total=$total&forward=".urlencode($forward);
		echo "<br /><br /><br /><a href=\"$url_forward\">Trình duyệt sẽ tự chuyển, Ấn vào nếu đợi lâu</a>";
		echo "<script>setTimeout(\"redirect('$url_forward');\", 1250);</script>";
	} else {
		@touch($lock_file);
		echo "Nâng cấp hoàn tất <br>Table (".UC_DBTABLEPRE."pms ở bản mới không xử dụng, vui lòng xóa đi";
	}

	showfooter();
}

function removecode($str, $length) {
	static $uccode = null;
	if($uccode === null) {
		require_once UC_ROOT.'lib/uccode.class.php';
		$uccode = new uccode();
	}
	$str = $uccode->complie($str);
	return trim(cutstr(strip_tags($str), $length));
}

function cutstr($string, $length, $dot = ' ...') {
	if(strlen($string) <= $length) {
		return $string;
	}
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);

	$strcut = '';
	if(strtolower(UC_CHARSET) == 'utf-8') {

		$n = $tn = $noc = 0;
		while($n < strlen($string)) {

			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t < 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}

			if($noc >= $length) {
				break;
			}

		}
		if($noc > $length) {
			$n -= $tn;
		}

		$strcut = substr($string, 0, $n);

	} else {
		for($i = 0; $i < $length; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}

	$strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);

	return $strcut.$dot;
}

function dir_clear($dir) {
	$directory = dir($dir);
	while($entry = $directory->read()) {
		$filename = $dir.'/'.$entry;
		if(is_file($filename)) {
			@unlink($filename);
		}
	}
	@touch($dir.'/index.htm');
	$directory->close();
}

function random($length, $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}

function generate_key() {
	$random = random(32);
	$info = md5($_SERVER['SERVER_SOFTWARE'].$_SERVER['SERVER_NAME'].$_SERVER['SERVER_ADDR'].$_SERVER['SERVER_PORT'].$_SERVER['HTTP_USER_AGENT'].time());
	$return = '';
	for($i=0; $i<64; $i++) {
		$p = intval($i/2);
		$return[$i] = $i % 2 ? $random[$p] : $info[$p];
	}
	return implode('', $return);
}

function createtable($sql, $dbcharset) {
	$type = strtoupper(preg_replace("/^\s*CREATE TABLE\s+.+\s+\(.+?\).*(ENGINE|TYPE)\s*=\s*([a-z]+?).*$/isU", "\\2", $sql));
	$type = in_array($type, array('MYISAM', 'HEAP')) ? $type : 'MYISAM';
	return preg_replace("/^\s*(CREATE TABLE\s+.+\s+\(.+?\)).*$/isU", "\\1", $sql).
	(mysql_get_server_info() > '4.1' ? " ENGINE=$type default CHARSET=".UC_DBCHARSET : " TYPE=$type");
}

function runquery($query) {
	global $db;

	$query = str_replace("\r", "\n", str_replace(' uc_', ' '.UC_DBTABLEPRE, $query));
	$expquery = explode(";\n", $query);

	foreach($expquery as $sql) {
		$sql = trim($sql);
		if($sql == '' || $sql[0] == '#') continue;

		if(strtoupper(substr($sql, 0, 12)) == 'CREATE TABLE') {
			$db->query(createtable($sql, UC_DBCHARSET));
		} elseif (strtoupper(substr($sql, 0, 11)) == 'ALTER TABLE') {
			runquery_altertable($sql);
		} else {
			$db->query($sql);
		}
	}
}

function getgpc($k, $var='R') {
	switch($var) {
		case 'G': $var = &$_GET; break;
		case 'P': $var = &$_POST; break;
		case 'C': $var = &$_COOKIE; break;
		case 'R': $var = &$_REQUEST; break;
	}
	return isset($var[$k]) ? $var[$k] : NULL;
}

function relationship($fromuid, $touid) {
	if($fromuid < $touid) {
		return $fromuid.'_'.$touid;
	} elseif($fromuid > $touid) {
		return $touid.'_'.$fromuid;
	} else {
		return '';
	}
}

function getposttablename($plid) {
	$id = substr((string)$plid, -1, 1);
	return 'pm_messages_'.$id;
}

function showheader() {
	global $version_old, $version_new;
	ob_start();
	$charset = UC_CHARSET;
	print <<< EOT
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=$charset" />
<title>UCenter Nâng cấp( $version_old &gt;&gt; $version_new)</title>
<meta name="MSSmartTagsPreventParsing" content="TRUE">
<meta http-equiv="MSThemeCompatible" content="Yes">
<style>
a:visited	{color: #FF0000; text-decoration: none}
a:link		{color: #FF0000; text-decoration: none}
a:hover		{color: #FF0000; text-decoration: underline}
body,table,td	{color: #3a4273; font-family: Tahoma, verdana, arial; font-size: 12px; line-height: 20px; scrollbar-base-color: #e3e3ea; scrollbar-arrow-color: #5c5c8d}
input		{color: #085878; font-family: Tahoma, verdana, arial; font-size: 12px; background-color: #3a4273; color: #ffffff; scrollbar-base-color: #e3e3ea; scrollbar-arrow-color: #5c5c8d}
.install	{font-family: Arial, Verdana; font-size: 14px; font-weight: bold; color: #000000}
.header		{font: 12px Tahoma, Verdana; font-weight: bold; background-color: #3a4273 }
.header	td	{color: #ffffff}
.red		{color: red; font-weight: bold}
.bg1		{background-color: #e3e3ea}
.bg2		{background-color: #eeeef6}
</style>
</head>

<body bgcolor="#3A4273" text="#000000">
<script type="text/javascript">
	function redirect(url) {
		window.location=url;
	}
</script>
<table width="95%" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
<tr>
<td>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td class="install" height="30" valign="bottom"><font color="#FF0000">&gt;&gt;</font>
UCenter  Nâng cấp( $version_old &gt;&gt; $version_new)</td>
</tr>
<tr>
<td>
<hr noshade align="center" width="100%" size="1">
</td>
</tr>
<tr>
<td align="center">
<b>Quá trình nâng cấp $version_old lên $version_new ，Trước khi update chắc chắn bạn đã up đè lên bộ ucenter cũ<br />
Hỗ trợ nâng cấp <a href="http://traitimyenbai.net/forum" target="_blank">Trái Tim Yên Bái</a></b>
</td>
</tr>
<tr>
<td>
<hr noshade align="center" width="100%" size="1">
</td>
</tr>
<tr><td>
EOT;
}

function showfooter() {
	echo <<< EOT
</td></tr></table></td></tr>
<tr><td height="100%">&nbsp;</td></tr>
</table>
</body>
</html>
EOT;
	ob_flush();
	exit();
}

function showerror($message, $break = 1) {
	echo '<br /><br />'.$message.'<br /><br />';
	if($break) showfooter();
}

function redirect($url) {

	$url = $url.(strstr($url, '&') ? '&' : '?').'t='.time();

	echo <<< EOT
<hr size=1>
<script language="JavaScript">
	function redirect() {
		window.location.replace('$url');
	}
	setTimeout('redirect();', 1000);
</script>
<br /><br />
&gt;&gt;<a href="$url">Trình duyệt sẽ tự chuyển, Ấn vào đây nếu đợi lâu</a>
<br /><br />
EOT;
	showfooter();
}

function get_table_columns($table) {
	global $db;
	$tablecolumns = array();
	if($db->version() > '4.1') {
		$query = $db->query("SHOW FULL COLUMNS FROM $table", 'SILENT');
	} else {
		$query = $db->query("SHOW COLUMNS FROM $table", 'SILENT');
	}
	while($field = @$db->fetch_array($query)) {
		$tablecolumns[$field['Field']] = $field;
	}
	return $tablecolumns;
}

function parse_alter_table_sql($s) {
	$arr = array();
	preg_match("/ALTER TABLE (\w+)/i", $s, $m);
	$tablename = substr($m[1], strlen(UC_DBTABLEPRE));
	preg_match_all("/add column (\w+) ([^\n;]+)/is", $s, $add);
	preg_match_all("/drop column (\w+)([^\n;]*)/is", $s, $drop);
	preg_match_all("/change (\w+) ([^\n;]+)/is", $s, $change);
	preg_match_all("/add key ([^\n;]+)/is", $s, $keys);
	preg_match_all("/add unique ([^\n;]+)/is", $s, $uniques);
	foreach($add[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($add[2][$k]));
		$arr[] = array($tablename, 'ADD', $colname, $attr);
	}
	foreach($drop[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($drop[2][$k]));
		$arr[] = array($tablename, 'DROP', $colname, $attr);
	}
	foreach($change[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($change[2][$k]));
		$arr[] = array($tablename, 'CHANGE', $colname, $attr);
	}
	foreach($keys[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($keys[0][$k]));
		$arr[] = array($tablename, 'INDEX', '', $attr);
	}
	foreach($uniques[1] as $k => $colname) {
		$attr = preg_replace("/(.+),$/", "\\1", trim($uniques[0][$k]));
		$arr[] = array($tablename, 'INDEX', '', $attr);
	}
	return $arr;
}

function runquery_altertable($sql) {
	global $db;
	$tablepre = UC_DBTABLEPRE;
	$dbcharset = UC_DBCHARSET;

	$updatesqls = parse_alter_table_sql($sql);

	foreach($updatesqls as $updatesql) {
		$successed = TRUE;

		if(is_array($updatesql) && !empty($updatesql[0])) {

			list($table, $action, $field, $sql) = $updatesql;

			if(empty($field) && !empty($sql)) {

				$query = "ALTER TABLE {$tablepre}{$table} ";
				if($action == 'INDEX') {
					$successed = $db->query("$query $sql", "SILENT");
				} elseif ($action == 'UPDATE') {
					$successed = $db->query("UPDATE {$tablepre}{$table} SET $sql", 'SILENT');
				}

			} elseif($tableinfo = get_table_columns($tablepre.$table)) {

				$fieldexist = isset($tableinfo[$field]) ? 1 : 0;

				$query = "ALTER TABLE {$tablepre}{$table} ";

				if($action == 'MODIFY') {

					$query .= $fieldexist ? "MODIFY $field $sql" : "ADD $field $sql";
					$successed = $db->query($query, 'SILENT');

				} elseif($action == 'CHANGE') {

					$field2 = trim(substr($sql, 0, strpos($sql, ' ')));
					$field2exist = isset($tableinfo[$field2]);

					if($fieldexist && ($field == $field2 || !$field2exist)) {
						$query .= "CHANGE $field $sql";
					} elseif($fieldexist && $field2exist) {
						$db->query("ALTER TABLE {$tablepre}{$table} DROP $field2", 'SILENT');
						$query .= "CHANGE $field $sql";
					} elseif(!$fieldexist && $fieldexist2) {
						$db->query("ALTER TABLE {$tablepre}{$table} DROP $field2", 'SILENT');
						$query .= "ADD $sql";
					} elseif(!$fieldexist && !$field2exist) {
						$query .= "ADD $sql";
					}
					$successed = $db->query($query);

				} elseif($action == 'ADD') {

					$query .= $fieldexist ? "CHANGE $field $field $sql" :  "ADD $field $sql";
					$successed = $db->query($query);

				} elseif($action == 'DROP') {
					if($fieldexist) {
						$successed = $db->query("$query DROP $field", "SILENT");
					}
					$successed = TRUE;
				}

			} else {

				$successed = 'TABLE NOT EXISTS';

			}
		}
	}
	return $successed;
}

?>
<?php

/**
 * DiscuzX Convert
 *
 * $Id: home_appcreditlog.php 10469 2010-05-11 09:12:14Z monkey $
 */

$curprg = basename(__FILE__);

$table_source = $db_source->tablepre.'appcreditlog';
$table_target = $db_target->tablepre.'home_appcreditlog';

$limit = 1000;
$nextid = 0;

$start = getgpc('start');
if($start == 0) {
	$db_target->query("TRUNCATE $table_target");
}

$query = $db_source->query("SELECT  * FROM $table_source WHERE logid>'$start' ORDER BY logid LIMIT $limit");
while ($log = $db_source->fetch_array($query)) {

	$nextid = $log['logid'];

	$log  = daddslashes($log, 1);

	$data = implode_field_value($log, ',', db_table_fields($db_target, $table_target));

	$db_target->query("INSERT INTO $table_target SET $data");
}

if($nextid) {
	showmessage("Tiếp tục convert DB ".$table_source." logid> $nextid", "index.php?a=$action&source=$source&prg=$curprg&start=$nextid");
}

?>
<?php

/**
 * DiscuzX Convert
 *
 * $Id: forumlinks.php 8815 2010-04-23 02:05:15Z monkey $
 */

$curprg = basename(__FILE__);

$table_source = $db_source->tablepre.'forumlinks';
$table_target = $db_target->tablepre.'common_friendlink';

$limit = 1000;
$nextid = 0;

$start = getgpc('start');
if($start == 0) {
	$db_target->query("TRUNCATE $table_target");
}

$query = $db_source->query("SELECT  * FROM $table_source WHERE id>'$start' ORDER BY id LIMIT $limit");
while ($row = $db_source->fetch_array($query)) {

	$nextid = $row['id'];

	$row  = daddslashes($row, 1);

	$data = implode_field_value($row, ',', db_table_fields($db_target, $table_target));

	$db_target->query("INSERT INTO $table_target SET $data");
}

if($nextid) {
	showmessage("Tiếp tục convert DB ".$table_source." id > $nextid", "index.php?a=$action&source=$source&prg=$curprg&start=$nextid");
}

?>
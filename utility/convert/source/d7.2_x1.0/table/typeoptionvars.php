<?php

/**
 * DiscuzX Convert
 *
 * $Id: typeoptionvars.php 10469 2010-05-11 09:12:14Z monkey $
 */

$curprg = basename(__FILE__);

$table_source = $db_source->tablepre.'typeoptionvars';
$table_target = $db_target->tablepre.'forum_typeoptionvar';

$limit = 1000;
$next = FALSE;

$start = $_GET['start'] ? getgpc('start') : 0;
if($start == 0) {
	$db_target->query("TRUNCATE $table_target");
}

$query = $db_source->query("SELECT * FROM $table_source ORDER BY tid LIMIT $start, $limit");
while ($data = $db_source->fetch_array($query)) {

	$next = TRUE;

	$data  = daddslashes($data, 1);

	$datalist = implode_field_value($data, ',', db_table_fields($db_target, $table_target));

	$db_target->query("INSERT INTO $table_target SET $datalist");
}

if($next) {
	showmessage("Tiếp tục convert DB ".$table_source." $start 至 ".($start+$limit)." 行", "index.php?a=$action&source=$source&prg=$curprg&start=".($start + $limit));
}

?>
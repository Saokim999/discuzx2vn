<?php

/**
 * DiscuzX Convert
 *
 * $Id: home_class.php 10469 2010-05-11 09:12:14Z monkey $
 */

$curprg = basename(__FILE__);

$table_source = $db_source->tablepre.'class';
$table_target = $db_target->tablepre.'home_class';

$limit = 1000;
$nextid = 0;

$start = getgpc('start');
if($start == 0) {
	$db_target->query("TRUNCATE $table_target");
}

$query = $db_source->query("SELECT  * FROM $table_source WHERE classid>'$start' ORDER BY classid LIMIT $limit");
while ($class = $db_source->fetch_array($query)) {

	$nextid = $class['classid'];

	$class  = daddslashes($class, 1);

	$data = implode_field_value($class, ',', db_table_fields($db_target, $table_target));

	$db_target->query("INSERT INTO $table_target SET $data");
}

if($nextid) {
	showmessage("Tiếp tục convert DB ".$table_source." classid> $nextid", "index.php?a=$action&source=$source&prg=$curprg&start=$nextid");
}

?>
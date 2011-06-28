<?php

$config = loadconfig();
$db_target = new db_mysql($config['target']);
$db_target->connect();

$readme = DISCUZ_ROOT.'./source/'.$source.'/readme.txt';
if(file_exists($readme)) {
	$txt = file_get_contents($readme);
} else {
	$txt = lang('finish');
}

$txt = nl2br(htmlspecialchars($txt));
$txt = str_replace('  ', '&nbsp;&nbsp;', $txt);
$txt = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $txt);

$process = load_process('main');
list($rday, $rhour, $rmin, $rsec) = remaintime(time() - $process['timestart']);
$stime = gmdate('Y-m-d H:i:s', $process['timestart'] + 3600* 8);
$etime = gmdate('Y-m-d H:i:s',time() + 3600* 8);
$timetodo = "Chúc mừng bạn đã chuyển đổi dữ liệu thành công^^!";
$timetodo .= "<br><br>Thời gian bắt đầu: <strong>$stime</strong><br>Thời gian hoàn thành: <strong>$etime</strong>";
$timetodo .= "<br>Convert trong: <strong>$rday</strong> ngày <strong>$rhour</strong> giờ <strong>$rmin</strong> phút <strong>$rsec</strong> giây";
$timetodo .= "<br><br>Để hoạt động bình thường bạn cần làm theo hướng dẫn bên dưới. Mọi thắc mắc vui lòng vào http://traitimyenbai.net để được trợ giúp";

showtips($timetodo);

show_table_header();
show_table_row(array('Chú ý (readme)'), 'title');
show_table_row(array($txt));
show_table_footer();

?>
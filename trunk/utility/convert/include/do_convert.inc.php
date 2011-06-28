<?php

$config = loadconfig();
$db_source = new db_mysql($config['source']);
$db_source->connect();

$db_target = new db_mysql($config['target']);
$db_target->connect();

$db_uc = new db_mysql($config['ucenter']);
if($setting['config']['ucenter']) {
	$db_uc->connect();
}

$process = load_process('main');
if(empty($process)) {
	showmessage("请首先选择转换程序", "index.php?action=select&source=$source");
}

$prg = getgpc('prg');

$prg_dir['tables'] = DISCUZ_ROOT.'./source/'.$source.'/table/';
$prg_dir['start'] = DISCUZ_ROOT.'./source/'.$source.'/';
$prg_dir['steps'] = DISCUZ_ROOT.'./source/'.$source.'/';

$prg_done = 0;
$prg_next = '';
$prg_total = $prg_total = count($process['tables']) + count($process['start']) + count($process['steps']);

foreach (array('start', 'tables', 'steps') as $program) {
	if(!empty($process[$program]) && !$process[$program.'_is_end']) {
		foreach ($process[$program] as $k => $v) {
			if($v) {
				$prg_done ++;
			} elseif ($prg_next == '') {
				$prg_next = $k;
			}
		}
		if($prg_next) {
			if(empty($prg) || !file_exists($prg_dir[$program].$prg)) {
				$prg = $prg_next;
			}
			$prg_done ++;

			list($rday, $rhour, $rmin, $rsec) = remaintime(time() - $process['timestart']);
			$stime = gmdate('Y-m-d H:i:s', $process['timestart'] + 3600* 8);
			$timetodo = "Cập nhập thời gian ：<strong>$stime</strong>, Nâng cấp hết <strong>$rday</strong> ngày <strong>$rhour</strong> giờ <strong>$rmin</strong> phút <strong>$rsec</strong> giây";
			$timetodo .= "<br><br>Đang Convert( $prg_done / $prg_total ) <strong>$prg</strong>，trình duyệt sẽ load nhiều lần, không đóng cửa sổ";
			$timetodo .= "<br><br>Nếu bị gián đoạn, bạn cần làm lại bước này, Click (<a href=\"index.php?a=convert&source=$source&prg=$prg\">Khởi động lại</a>)";

			showtips($timetodo);
			if(file_exists($prg_dir[$program].$prg)) {
				define('PROGRAM_TYPE', $program);
				require $prg_dir[$program].$prg;
				save_process_main($prg);
				showmessage("Chuyển đổi $prg thực hiện， Tiếp tục tới", "index.php?a=convert&source=$source", null, 500);
			} else {
				showmessage('Convert có lỗi'.$prg);
			}
		} else {
			$process[$program.'_is_end'] = 1;
			save_process('main', $process);
		}
	} else {
		$prg_done = $prg_done + count($process[$program]);
	}
}

showmessage('Convert dữ liệu hoàn tất', "index.php?action=finish&source=$source");

function save_process_main($prg = '') {
	global $process;
	if(defined('PROGRAM_TYPE')) {
		$prg = empty($prg) ? $GLOBALS['prg'] : $prg;
		$process[PROGRAM_TYPE][$prg] = 1;
	}
	save_process('main', $process);
}
?>
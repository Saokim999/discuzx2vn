<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: function_profile.php 21975 2011-04-19 03:14:12Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function profile_setting($fieldid, $space=array(), $showstatus=false, $ignoreunchangable = false, $ignoreshowerror = false) {
	global $_G;

	if(empty($_G['cache']['profilesetting'])) {
		loadcache('profilesetting');
	}
	$field = $_G['cache']['profilesetting'][$fieldid];
	if(empty($field) || !$field['available'] || in_array($fieldid, array('uid', 'constellation', 'zodiac', 'birthmonth', 'birthyear', 'birthprovince', 'birthdist', 'birthcommunity', 'resideprovince', 'residedist', 'residecommunity'))) {
		return '';
	}

	if($showstatus) {
		$uid = intval($space['uid']);
		if($uid && !isset($_G['profile_verifys'][$uid])) {
			$_G['profile_verifys'][$uid] = array();
			$query = DB::query('SELECT field FROM '.DB::table('common_member_verify_info')." WHERE uid = '$uid' AND verifytype='0'");
			while($value = DB::fetch($query)) {
				$fields = unserialize($value['field']);
				foreach($fields as $key => $fvalue) {
					if($_G['cache']['profilesetting'][$key]['needverify']) {
						$_G['profile_verifys'][$uid][$key] = $fvalue;
					}
				}
			}
		}
		$verifyvalue = NULL;
		if(isset($_G['profile_verifys'][$uid][$fieldid])) {
			if($fieldid=='gender') {
				$verifyvalue = lang('space', 'gender_'.intval($_G['profile_verifys'][$uid][$fieldid]));
			} elseif($fieldid=='birthday') {
				$verifyvalue = $_G['profile_verifys'][$uid]['birthyear'].'-'.$_G['profile_verifys'][$uid]['birthmonth'].'-'.$_G['profile_verifys'][$uid]['birthday'];
			} else {
				$verifyvalue = $_G['profile_verifys'][$uid][$fieldid];
			}
		}
	}

	$html = '';
	$field['unchangeable'] = !$ignoreunchangable && $field['unchangeable'] ? 1 : 0;
	if($fieldid == 'birthday') {
		if($field['unchangeable'] && !empty($space[$fieldid])) {
			return '<span>'.$space['birthyear'].'-'.$space['birthmonth'].'-'.$space['birthday'].'</span>';
		}
		$birthyeayhtml = '';
		$nowy = dgmdate($_G['timestamp'], 'Y');
		for ($i=0; $i<100; $i++) {
			$they = $nowy - $i;
			$selectstr = $they == $space['birthyear']?' selected':'';
			$birthyeayhtml .= "<option value=\"$they\"$selectstr>$they</option>";
		}
		$birthmonthhtml = '';
		for ($i=1; $i<13; $i++) {
			$selectstr = $i == $space['birthmonth']?' selected':'';
			$birthmonthhtml .= "<option value=\"$i\"$selectstr>$i</option>";
		}
		$birthdayhtml = '';
		if(empty($space['birthmonth']) || in_array($space['birthmonth'], array(1, 3, 5, 7, 8, 10, 12))) {
			$days = 31;
		} elseif(in_array($space['birthmonth'], array(4, 6, 9, 11))) {
			$days = 30;
		} elseif($space['birthyear'] && (($space['birthyear'] % 400 == 0) || ($space['birthyear'] % 4 == 0 && $space['birthyear'] % 400 != 0))) {
			$days = 29;
		} else {
			$days = 28;
		}
		for ($i=1; $i<=$days; $i++) {
			$selectstr = $i == $space['birthday']?' selected':'';
			$birthdayhtml .= "<option value=\"$i\"$selectstr>$i</option>";
		}
		$html = '<select name="birthyear" id="birthyear" class="ps" onchange="showbirthday();" tabindex="1">'
				.'<option value="">'.lang('space', 'year').'</option>'
				.$birthyeayhtml
				.'</select>'
				.'&nbsp;&nbsp;'
				.'<select name="birthmonth" id="birthmonth" class="ps" onchange="showbirthday();" tabindex="1">'
				.'<option value="">'.lang('space', 'month').'</option>'
				.$birthmonthhtml
				.'</select>'
				.'&nbsp;&nbsp;'
				.'<select name="birthday" id="birthday" class="ps" tabindex="1">'
				.'<option value="">'.lang('space', 'day').'</option>'
				.$birthdayhtml
				.'</select>';

	} elseif($fieldid=='gender') {
		if($field['unchangeable'] && $space[$fieldid] > 0) {
			return '<span>'.lang('space', 'gender_'.intval($space[$fieldid])).'</span>';
		}
		$selected = array($space[$fieldid]=>' selected="selected"');
		$html = '<select name="gender" id="gender" class="ps" tabindex="1">';
		if($field['unchangeable']) {
			$html .= '<option value="">'.lang('space', 'gender').'</option>';
		} else {
			$html .= '<option value="0"'.($space[$fieldid]=='0' ? ' selected="selected"' : '').'>'.lang('space', 'gender_0').'</option>';
		}
		$html .= '<option value="1"'.($space[$fieldid]=='1' ? ' selected="selected"' : '').'>'.lang('space', 'gender_1').'</option>'
			.'<option value="2"'.($space[$fieldid]=='2' ? ' selected="selected"' : '').'>'.lang('space', 'gender_2').'</option>'
			.'</select>';

	} elseif($fieldid=='birthcity') {
		if($field['unchangeable'] && !empty($space[$fieldid])) {
			return '<span>'.$space['birthprovince'].'-'.$space['birthcity'].'</span>';
		}
		$values = array(0,0,0,0);
		$elems = array('birthprovince', 'birthcity', 'birthdist', 'birthcommunity');
		if(!empty($space['birthprovince'])) {
			$html = profile_show('birthcity', $space);
			$html .= '&nbsp;(<a href="javascript:;" onclick="showdistrict(\'birthdistrictbox\', [\'birthprovince\', \'birthcity\', \'birthdist\', \'birthcommunity\'], 4); return false;">'.lang('spacecp', 'profile_edit').'</a>)';
			$html .= '<p id="birthdistrictbox"></p>';
		} else {
			$html = '<p id="birthdistrictbox">'.showdistrict($values, $elems, 'birthdistrictbox', 1).'</p>';
		}

	} elseif($fieldid=='residecity') {
		if($field['unchangeable'] && !empty($space[$fieldid])) {
			return '<span>'.$space['resideprovince'].'-'.$space['residecity'].'</span>';
		}
		$values = array(0,0,0,0);
		$elems = array('resideprovince', 'residecity', 'residedist', 'residecommunity');
		if(!empty($space['resideprovince'])) {
			$html = profile_show('residecity', $space);
			$html .= '&nbsp;(<a href="javascript:;" onclick="showdistrict(\'residedistrictbox\', [\'resideprovince\', \'residecity\', \'residedist\', \'residecommunity\'], 4); return false;">'.lang('spacecp', 'profile_edit').'</a>)';
			$html .= '<p id="residedistrictbox"></p>';
		} else {
			$html = '<p id="residedistrictbox">'.showdistrict($values, $elems, 'residedistrictbox', 1).'</p>';
		}
	} else {
		if($field['unchangeable'] && $space[$fieldid]!='') {
			if($field['formtype']=='file') {
				$imgurl = getglobal('setting/attachurl').'./profile/'.$space[$fieldid];
				return '<span><a href="'.$imgurl.'" target="_blank"><img src="'.$imgurl.'"  style="max-width: 500px;" /></a></span>';
			} else {
				return '<span>'.nl2br($space[$fieldid]).'</span>';
			}
		}
		if($field['formtype']=='textarea') {
			$html = "<textarea name=\"$fieldid\" id=\"$fieldid\" class=\"pt\" rows=\"3\" cols=\"40\" tabindex=\"1\">$space[$fieldid]</textarea>";
		} elseif($field['formtype']=='select') {
			$field['choices'] = explode("\n", $field['choices']);
			$html = "<select name=\"$fieldid\" class=\"ps\" tabindex=\"1\">";
			foreach($field['choices'] as $op) {
				$html .= "<option value=\"$op\"".($op==$space[$fieldid] ? 'selected="selected"' : '').">$op</option>";
			}
			$html .= '</select>';
		} elseif($field['formtype']=='list') {
			$field['choices'] = explode("\n", $field['choices']);
			$html = "<select name=\"{$fieldid}[]\" class=\"ps\" multiple=\"multiplue\" tabindex=\"1\">";
			$space[$fieldid] = explode("\n", $space[$fieldid]);
			foreach($field['choices'] as $op) {
				$html .= "<option value=\"$op\"".(in_array($op, $space[$fieldid]) ? 'selected="selected"' : '').">$op</option>";
			}
			$html .= '</select>';
		} elseif($field['formtype']=='checkbox') {
			$field['choices'] = explode("\n", $field['choices']);
			$space[$fieldid] = explode("\n", $space[$fieldid]);
			foreach($field['choices'] as $op) {
				$html .= ''
					."<label class=\"lb\"><input type=\"checkbox\" name=\"{$fieldid}[]\" class=\"pc\" value=\"$op\" tabindex=\"1\"".(in_array($op, $space[$fieldid]) ? ' checked="checked"' : '')." />"
					."$op</label>";
			}
		} elseif($field['formtype']=='radio') {
			$field['choices'] = explode("\n", $field['choices']);
			foreach($field['choices'] as $op) {
				$html .= ''
						."<label class=\"lb\"><input type=\"radio\" name=\"{$fieldid}\" class=\"pr\" value=\"$op\" tabindex=\"1\"".($op == $space[$fieldid] ? ' checked="checked"' : '')." />"
						."$op</label>";
			}
		} elseif($field['formtype']=='file') {
			$html = "<input type=\"file\" value=\"\" name=\"$fieldid\" tabindex=\"1\" class=\"pf\" style=\"height:26px;\" /><input type=\"hidden\" name=\"$fieldid\" value=\"$space[$fieldid]\" />";
			if(!empty($space[$fieldid])) {
				$url = getglobal('setting/attachurl').'./profile/'.$space[$fieldid];
				$html .= "&nbsp;<label><input type=\"checkbox\" class=\"checkbox\" tabindex=\"1\" name=\"deletefile[$fieldid]\" value=\"yes\" />".lang('spacecp', 'delete')."</label><br /><a href=\"$url\" target=\"_blank\"><img src=\"$url\" width=\"200\" class=\"mtm\" /></a>";
			}
		} else {
			$html = "<input type=\"text\" name=\"$fieldid\" class=\"px\" value=\"$space[$fieldid]\" tabindex=\"1\" />";
		}
	}
	$html .= !$ignoreshowerror ? "<div class=\"rq mtn\" id=\"showerror_$fieldid\"></div>" : '';
	if($showstatus) {
		$html .= "<p class=\"d\">$value[description]";
		if($space[$fieldid]=='' && $value['unchangeable']) {
			$html .= lang('spacecp', 'profile_unchangeable');
		}
		if($verifyvalue !== null) {
			if($field['formtype'] == 'file') {
				$imgurl = getglobal('setting/attachurl').'./profile/'.$verifyvalue;
				$verifyvalue = "<img src='$imgurl' alt='$imgurl' style='max-width: 500px;'/>";
			}
			$html .= "<strong>".lang('spacecp', 'profile_is_verifying')." (<a href=\"#\" onclick=\"display('newvalue_$fieldid');return false;\">".lang('spacecp', 'profile_mypost')."</a>)</strong>"
				."<p id=\"newvalue_$fieldid\" style=\"display:none\">".$verifyvalue."</p>";
		} elseif($field['needverify']) {
			$html .= lang('spacecp', 'profile_need_verifying');
		}
		$html .= '</p>';
	}

	return $html;
}

function profile_check($fieldid, &$value, $space=array()) {
	global $_G;

	if(empty($_G['cache']['profilesetting'])) {
		loadcache('profilesetting');
	}
	if(empty($_G['profilevalidate'])) {
		include libfile('spacecp/profilevalidate', 'include');
		$_G['profilevalidate'] = $profilevalidate;
	}

	$field = $_G['cache']['profilesetting'][$fieldid];
	if(empty($field) || !$field['available']) {
		return false;
	}

	if($value=='') {
		if($field['required']) {
			if(in_array($fieldid, array('birthprovince', 'birthcity', 'birthdist', 'birthcommunity', 'resideprovince', 'residecity', 'residedist', 'residecommunity'))) {
				if(substr($fieldid, 0, 5) == 'birth') {
					if(!empty($_G['gp_birthprovince']) || !empty($_G['gp_birthcity']) || !empty($_G['gp_birthdist']) || !empty($_G['gp_birthcommunity'])) {
						return true;
					}
				} elseif(!empty($_G['gp_resideprovince']) || !empty($_G['gp_residecity']) || !empty($_G['gp_residedist']) || !empty($_G['gp_residecommunity'])) {
					return true;
				}
			}
			return false;
		} else {
			return true;
		}
	}
	if($field['unchangeable'] && !empty($space[$fieldid])) {
		return false;
	}

	include_once libfile('function/home');
	if(in_array($fieldid, array('birthday', 'birthmonth', 'birthyear', 'gender'))) {
		$value = intval($value);
		return true;
	} elseif(in_array($fieldid, array('birthprovince', 'birthcity', 'birthdist', 'birthcommunity', 'resideprovince', 'residecity', 'residedist', 'residecommunity'))) {
		$value = getstr($value, '', 1, 1);
		return true;
	}

	if($field['choices']) {
		$field['choices'] = explode("\n", $field['choices']);
	}
	if($field['formtype'] == 'text' || $field['formtype'] == 'textarea') {
		$value = getstr($value, '', 1, 1);
		if($field['size'] && strlen($value) > $field['size']) {
			return false;
		} else {
			$field['validate'] = !empty($field['validate']) ? $field['validate'] : ($_G['profilevalidate'][$fieldid] ? $_G['profilevalidate'][$fieldid] : '');
			if($field['validate'] && !preg_match($field['validate'], $value)) {
				return false;
			}
		}
	} elseif($field['formtype'] == 'checkbox' || $field['formtype'] == 'list') {
		$arr = array();
		foreach ($value as $op) {
			if(in_array(stripslashes($op), $field['choices'])) {
				$arr[] = $op;
			}
		}
		$value = implode("\n", $arr);
		if($field['size'] && count($arr) > $field['size']) {
			return false;
		}
	} elseif($field['formtype'] == 'radio' || $field['formtype'] == 'select') {
		if(!in_array(stripslashes($value), $field['choices'])){
			return false;
		}
	}
	return true;
}

function profile_show($fieldid, $space=array()) {
	global $_G;

	if(empty($_G['cache']['profilesetting'])) {
		loadcache('profilesetting');
	}
	$field = $_G['cache']['profilesetting'][$fieldid];
	if(empty($field) || !$field['available'] || in_array($fieldid, array('uid', 'birthmonth', 'birthyear', 'birthprovince', 'resideprovince'))) {
		return false;
	}

	if($fieldid=='gender') {
		return lang('space', 'gender_'.intval($space['gender']));
	} elseif($fieldid=='birthday') {
		$return = $space['birthyear'] ? $space['birthyear'].' '.lang('space', 'year').' ' : '';
		if($space['birthmonth'] && $space['birthday']) {
			$return .= $space['birthmonth'].' '.lang('space', 'month').' '.$space['birthday'].' '.lang('space', 'day');
		}
		return $return;
	} elseif($fieldid=='birthcity') {
		return $space['birthprovince']
				.(!empty($space['birthcity']) ? '&nbsp;'.$space['birthcity'] : '')
				.(!empty($space['birthdist']) ? '&nbsp;'.$space['birthdist'] : '')
				.(!empty($space['birthcommunity']) ? '&nbsp;'.$space['birthcommunity'] : '');
	} elseif($fieldid=='residecity') {
		return $space['resideprovince']
				.(!empty($space['residecity']) ? '&nbsp;'.$space['residecity'] : '')
				.(!empty($space['residedist']) ? '&nbsp;'.$space['residedist'] : '')
				.(!empty($space['residecommunity']) ? '&nbsp;'.$space['residecommunity'] : '');
	} elseif($fieldid == 'site') {
		$url = str_replace('"', '\\"', $space[$fieldid]);
		return "<a href=\"$url\" target=\"_blank\">$url</a>";
	} else {
		return nl2br($space[$fieldid]);
	}
}


function showdistrict($values, $elems=array(), $container='districtbox', $showlevel=null) {
	$showlevel = !empty($showlevel) ? intval($showlevel) : count($values);
	$showlevel = $showlevel <= 4 ? $showlevel : 4;
	$upids = array(0);
	for($i=0;$i<$showlevel;$i++) {
		if(!empty($values[$i])) {
			$upids[] = intval($values[$i]);
		} else {
			for($j=$i; $j<$showlevel; $j++) {
				$values[$j] = '';
			}
			break;
		}
	}
	$options = array(1=>array(), 2=>array(), 3=>array(), 4=>array());
	$containertype = substr($container, 0, 5);
	if($upids && is_array($upids)) {
		$query = DB::query('SELECT * FROM '.DB::table('common_district')." WHERE upid IN (".dimplode($upids).') ORDER BY displayorder');
		while($value = DB::fetch($query)) {
			if($value['level'] == 1 && ($value['id'] != $values[0] && ($value['usetype'] == 0 || !(($containertype == 'birth' && in_array($value['usetype'], array(1, 3))) || ($containertype != 'birth' && in_array($value['usetype'], array(2, 3))))))) {
				continue;
			}
			$options[$value['level']][] = array($value['id'], $value['name']);
		}
	}
	$names = array('province', 'city', 'district', 'community');
	for($i=0; $i<4;$i++) {
		$elems[$i] = !empty($elems[$i]) ? $elems[$i] : $names[$i];
	}
	$html = '';
	for($i=0;$i<$showlevel;$i++) {
		$level = $i+1;
		if(!empty($options[$level])) {
			$jscall = "showdistrict('$container', ['$elems[0]', '$elems[1]', '$elems[2]', '$elems[3]'], $showlevel, $level)";
			$html .= '<select name="'.$elems[$i].'" id="'.$elems[$i].'" class="ps" onchange="'.$jscall.'" tabindex="1">';
			$html .= '<option value="">'.lang('spacecp', 'district_level_'.$level).'</option>';
			foreach($options[$level] as $option) {
				$selected = $option[0] == $values[$i] ? ' selected="selected"' : '';
				$html .= '<option did="'.$option[0].'" value="'.$option[1].'"'.$selected.'>'.$option[1].'</option>';
			}
			$html .= '</select>';
			$html .= '&nbsp;&nbsp;';
		}
	}
	return $html;
}

function countprofileprogress($uid = 0) {
	global $_G;

	$uid = intval(!$uid ? $_G['uid'] : $uid);
	$result = DB::fetch_first("SELECT * FROM ".DB::table('common_setting')." WHERE skey='profilegroup'");
	if(!empty($result['svalue'])) {
		$profilegroup = unserialize($result['svalue']);
		$fields = array();
		foreach($profilegroup as $type => $value) {
			foreach($value['field'] as $key => $field) {
				$fields[$key] = $field;
			}
		}
		if(isset($fields['sightml']) && empty($_G['group']['maxsigsize'])) {
			unset($fields['sightml']);
		}
		if(isset($fields['customstatus']) && empty($_G['group']['allowcstatus'])) {
			unset($fields['customstatus']);
		}
		loadcache('profilesetting');
		$allowcstatus = !empty($_G['group']['allowcstatus']) ? true : false;
		$complete = 0;
		$profile = DB::fetch_first("SELECT p.*, f.sightml, f.customstatus FROM ".DB::table('common_member_profile')." p LEFT JOIN ".DB::table('common_member_field_forum')." f USING(uid)  WHERE p.uid='$uid'");
		foreach($fields as $key) {
			if((!isset($_G['cache']['profilesetting'][$key]) || !$_G['cache']['profilesetting'][$key]['available']) && !in_array($key, array('sightml', 'customstatus'))) {
				unset($fields[$key]);
				continue;
			}
			if(in_array($key, array('birthday', 'birthyear', 'birthprovince', 'birthcity', 'birthdist', 'birthcommunity', 'resideprovince', 'residecity', 'residedist', 'residecommunity'))) {
				if($key=='birthday') {
					if(!empty($profile['birthyear']) || !empty($profile[$key])) {
						$complete++;
					}
					unset($fields['birthyear']);
				} elseif($key=='birthcity') {
					if(!empty($profile['birthprovince']) || !empty($profile[$key]) || !empty($profile['birthdist']) || !empty($profile['birthcommunity'])) {
						$complete++;
					}
					unset($fields['birthprovince']);
					unset($fields['birthdist']);
					unset($fields['birthcommunity']);
				} elseif($key=='residecity') {
					if(!empty($profile['resideprovince']) || !empty($profile[$key]) || !empty($profile['residedist']) || !empty($profile['residecommunity'])) {
						$complete++;
					}
					unset($fields['resideprovince']);
					unset($fields['residedist']);
					unset($fields['residecommunity']);
				}
			} else if($profile[$key] != '') {
				$complete++;
			}
		}
		$progress = floor($complete / count($fields) * 100);
		DB::update('common_member_status', array('profileprogress' => $progress > 100 ? 100 : $progress), array('uid' => $uid));
		return $progress;
	}
}

function get_constellation($birthmonth,$birthday) {
	$birthmonth = intval($birthmonth);
	$birthday = intval($birthday);
	$idx = $birthmonth;
	if ($birthday <= 22) {
		if (1 == $birthmonth) {
			$idx = 12;
		} else {
			$idx = $birthmonth - 1;
		}
	}
	return $idx > 0 && $idx <= 12 ? lang('space', 'constellation_'.$idx) : '';
}

function get_zodiac($birthyear) {
	$birthyear = intval($birthyear);
	$idx = (($birthyear - 1900) % 12) + 1;
	return $idx > 0 && $idx <= 12 ? lang('space', 'zodiac_'. $idx) : '';
}
?>
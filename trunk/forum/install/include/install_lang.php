<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *      $Id: install_lang.php 22362 2011-05-04 08:12:56Z congyushuai $
 */

define('UC_VERNAME', 'Việt Nam');
$lang = array(
	'SC_GBK' => 'SC GBK',
	'TC_BIG5' => 'TC BIG5',
	'SC_UTF8' => 'Tiếng Việt',
	'TC_UTF8' => 'TC UTF8',
	'EN_ISO' => 'ENGLISH ISO8859',
	'EN_UTF8' => 'ENGLIST UTF-8',

	'title_install' => 'Cài đặt Discuz X2',
	'agreement_yes' => 'Đồng ý',
	'agreement_no' => 'Hủy bỏ',
	'notset' => 'Không giới hạn',

	'message_title' => 'Thông báo',
	'error_message' => 'Có lỗi',
	'message_return' => 'Quay lại',
	'return' => 'Quay lại',
	'install_wizard' => 'Cài đặt Discuz X2.0',
	'config_nonexistence' => 'Tập tin cấu hình không tồn tại',
	'nodir' => 'Thư mục không tồn tại',
	'redirect' => 'Trình duyệt sẽ tự động chuyển sang trang mới.<br>Nếu trình duyệt của bạn không hỗ trợ hãy bấm vào đây.',
	'auto_redirect' => 'Trình duyệt sẽ tự động chuyển sang trang mới',
	'database_errno_2003' => 'Không thể kết nối với CSDL vui lòng kiểm tra địa chỉ máy chủ CSDL',
	'database_errno_1044' => 'Không thể tạo CSDL mới, hãy kiểm tra tên CSDL là chính xác',
	'database_errno_1045' => 'Không thể kết nối với CSDL vui lòng kiểm tra tài khoản hoặc mật khẩu CSDL',
	'database_errno_1064' => 'Lỗi kết nối CSDL',

	'dbpriv_createtable' => 'Ko thể CREATE TABLE để tiếp tục cài đặt',
	'dbpriv_insert' => 'Ko thể INSERT để tiếp tục cài đặt',
	'dbpriv_select' => 'Ko thể SELECT để tiếp tục cài đặt',
	'dbpriv_update' => 'Ko thể UPDATE để tiếp tục cài đặt',
	'dbpriv_delete' => 'Ko thể DELETE để tiếp tục cài đặt',
	'dbpriv_droptable' => 'Ko thể DROP TABLE để tiếp tục cài đặt',

	'db_not_null' => 'CSDL đã được cài đặt Ucenter, tiếp tục cài đặt sẽ xóa dữ liệu gốc.',
	'db_drop_table_confirm' => 'Tiếp tục cài đặt CSDL cũ sẽ bị xóa hết. Bạn có chắc chắn muốn tiếp tục ?',

	'writeable' => 'Có thể viết',
	'unwriteable' => 'Ko thể viết',
	'old_step' => 'Quay lại',
	'new_step' => 'Tiếp theo',

	'database_errno_2003' => 'Không thể kết nối với CSDL vui lòng kiểm tra địa chỉ máy chủ CSDL',
	'database_errno_1044' => 'Không thể tạo CSDL mới, hãy kiểm tra tên CSDL là chính xác',
	'database_errno_1045' => 'Không thể kết nối với CSDL vui lòng kiểm tra tài khoản hoặc mật khẩu CSDL',
	'database_connect_error' => 'Lỗi kết nối CSDL',

	'step_title_1' => 'Kiểm tra môi trường',
	'step_title_2' => 'Tùy chọn cài Ucenter',
	'step_title_3' => 'Cơ sở dữ liệu',
	'step_title_4' => 'Cài đặt',
	'step_env_check_title' => 'Bắt đầu cài đặt',
	'step_env_check_desc' => 'Kiểm tra môi trường cài đặt',
	'step_db_init_title' => 'Cài đặt cơ sở dữ liệu',
	'step_db_init_desc' => 'Đang chạy trình cài đặt cơ sở dữ liệu',
	'step1_file' => 'Tập tin',
	'step1_need_status' => 'Yêu cầu',
	'step1_status' => 'Hiện tại',
	'not_continue' => 'Xin vui lòng sửa đổi theo yêu cầu',

	'tips_dbinfo' => 'Điền thông tin CSDL',
	'tips_dbinfo_comment' => '',
	'tips_admininfo' => 'Điền thông tin quản trị',
	'step_ext_info_title' => 'Cài đặt thành công',
	'step_ext_info_comment' => 'Nhấn vào đây để nhập thông tin đăng nhập',

	'ext_info_succ' => 'Cài đặt thành công',
	'install_submit' => 'Tiếp tục',
	'install_locked' => 'Cài đặt đã bị khóa, nếu bạn thực sự muốn cài đặt lại, hãy vào máy chủ xóa <br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg' => 'Bạn phải giải quyết vấn đề trên, để việc cài đặt có thể tiếp tục',

	'step_app_reg_title' => 'Thiết lập môi trường',
	'step_app_reg_desc' => 'Kiểm tra máy chủ và Ucenter',
	'tips_ucenter' => 'Điền thông tin Ucenter',
	'tips_ucenter_comment' => 'Nếu bạn đã cài đặt Ucenter thì hãy điền vào các thông tin dưới đây, nếu chưa cài đặt bạn có thể tải Ucenter tại <a href="http://www.discuz.com/" target="blank">Comsenz</a> hoặc <a href="http://www.discuzviet.net/" target="blank">DiscuzViet.Net</a>',

	'advice_mysql_connect' => 'Kiểm tra chắc chắn các module mysql ko bị lỗi',
	'advice_fsockopen' => 'Sửa trong php.ini hàm allow_url_fopen sang On để có thể cài đặt',
	'advice_gethostbyname' => 'Để cài đặt cần mở chức năng gethostbyname',
	'advice_file_get_contents' => 'Sửa trong php.ini hàm allow_url_fopen sang On để có thể cài đặt',
	'advice_xml_parser_create' => 'Chức năng này yêu cầu có hỗ trợ XML trong PHP',

	'ucurl' => 'URL UCenter',
	'ucpw' => 'Mật khẩu',
	'ucip' => 'IP UCenter',
	'ucenter_ucip_invalid' => 'Định dạng lỗi, vui lòng điền đúng định dạng IP',
	'ucip_comment' => '',

	'tips_siteinfo' => 'Xin vui lòng điền vào các thông tin trang web',
	'sitename' => 'Tên trang web',
	'siteurl' => 'URL trang web',

	'forceinstall' => 'Bắt buộc cài đặt',
	'dbinfo_forceinstall_invalid' => 'CSDL này đã chứa dữ liệu, để cài đặt bạn có thể sửa các bảng tiền tố hoặc cài đè nên dữ liệu cũ.',

	'click_to_back' => 'Quay lại',
	'adminemail' => 'Admin Email',
	'adminemail_comment' => '',
	'dbhost_comment' => 'Thường là localhost',
	'tablepre_comment' => '',
	'forceinstall_check_label' => 'Tôi sẽ cài đè dữ liệu cũ',

	'uc_url_empty' => 'Bạn chưa điền URL Ucenter.',
	'uc_url_invalid' => 'URL không hợp lệ',
	'uc_url_unreachable' => 'Sai URL Ucenter, vui lòng kiểm tra',
	'uc_ip_invalid' => 'Không thể dùng tên miền, vui lòng điền IP',
	'uc_admin_invalid' => 'Sai mật khẩu Ucenter',
	'uc_data_invalid' => 'Sai thông tin, vui lòng kiểm tra URL Ucenter ',
	'uc_dbcharset_incorrect' => 'Mã font Ucenter không trùng với Discuz X1.5, vui lòng kiểm tra',
	'uc_api_add_app_error' => 'Thêm ứng dụng vài Ucenter ko thành công',
	'uc_dns_error' => 'DNS Ucenter lỗi vui lòng dùng IP',

	'ucenter_ucurl_invalid' => 'Sai URL Ucenter',
	'ucenter_ucpw_invalid' => 'Sai mật khẩu Ucenter',
	'siteinfo_siteurl_invalid' => 'URL trang web trống hoặc sai định dạng',
	'siteinfo_sitename_invalid' => 'Tên trang web trống, vui lòng kiểm tra',
	'dbinfo_dbhost_invalid' => 'Sai tên máy chủ CSDL',
	'dbinfo_dbname_invalid' => 'Sai tài khoản',
	'dbinfo_dbuser_invalid' => 'Sai tài khoản CSDL, vui lòng kiểm tra',
	'dbinfo_dbpw_invalid' => 'Sai mật khẩu CSDL, vui lòng kiểm tra',
	'dbinfo_adminemail_invalid' => 'Email trống, vui lòng kiểm tra',
	'dbinfo_tablepre_invalid' => 'Bảng tiền tố trống hoặc sai định dạng, vui lòng kiểm tra',
	'admininfo_username_invalid' => 'Tên tài khoản trống hoặc sai định dạng, vui lòng kiểm tra',
	'admininfo_email_invalid' => 'Email trống, vui lòng kiểm tra',
	'admininfo_password_invalid' => 'Mật khẩu trống, vui lòng kiểm tra',
	'admininfo_password2_invalid' => 'Hai mật khẩu không giống nhau.',

	'install_dzfull' => '<br><label><input type="radio"'.(getgpc('install_ucenter') != 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="yes" onclick="if(this.checked)$(\'form_items_2\').style.display=\'none\';" />Cài mới UCenter</label>',
	'install_dzonly' => '<br><label><input type="radio"'.(getgpc('install_ucenter') == 'no' ? ' checked="checked"' : '').' name="install_ucenter" value="no" onclick="if(this.checked)$(\'form_items_2\').style.display=\'\';" />Dùng Ucenter đã có</label>',

	'username' => 'Tài khoản',
	'email' => 'Email',
	'password' => 'Mật khẩu',
	'password_comment' => '',
	'password2' => 'Nhập lại',

	'admininfo_invalid' => 'Sai thông tin, vui lòng kiểm tra lại',
	'dbname_invalid' => 'Tên CSDL trống, vui lòng điền lại',
	'tablepre_invalid' => 'Sai tiền tố hoặc trống, vui lòng kiểm tra',
	'admin_username_invalid' => 'Tên tài khoản không đúng, tối đa là 15 ký tự và ko có ký tự đặc biệt',
	'admin_password_invalid' => 'Hai mật khẩu không giống nhau',
	'admin_email_invalid' => 'Email lỗi, email đã được sử dụng hoặc sai định dạng.',
	'admin_invalid' => 'Thông tin lỗi, hãy nhập cẩn thận từng mục',
	'admin_exist_password_error' => 'Tên người sử dụng đã tồn tại, nếu bạn muốn thiết lập quản trị diễn đàn này, vui lòng nhập đúng mật khẩu cho người dùng, hoặc thay thế tên của người quản trị diễn đàn',

	'tagtemplates_subject' => 'Tiêu đề',
	'tagtemplates_uid' => 'Số ID',
	'tagtemplates_username' => 'Tài khoản',
	'tagtemplates_dateline' => 'Ngày',
	'tagtemplates_url' => 'Địa chỉ chủ đề',

	'uc_version_incorrect' => 'Phiên bản Ucenter đã quá cũ bạn cần cập nhật bản mới tại ：http://www.comsenz.com/ hoặc http://wwww.discuzviet.net',
	'config_unwriteable' => 'Ko cài đặt, bạn cần chmod tập tin config.inc.php = 0777',

	'install_in_processed' => 'Cài đặt ...',
	'install_succeed' => 'Cài đặt thành công, bấm vào đây để tiếp tục',

	'init_credits_karma' => 'Uy tín',
	'init_credits_money' => 'Tiền',

	'init_postno0' => 'Chủ nhà',
	'init_postno1' => 'Sofa',
	'init_postno2' => 'Ghế gỗ',
	'init_postno3' => 'Nền',

	'init_support' => 'Tốt',
	'init_opposition' => 'Kém',

	'init_group_0' => 'Thành viên',
	'init_group_1' => 'Quản trị viên',
	'init_group_2' => 'Siêu quản lý',
	'init_group_3' => 'Quản lý',
	'init_group_4' => 'Cấm phát ngôn',
	'init_group_5' => 'Cấm truy cập',
	'init_group_6' => 'Cấm IP',
	'init_group_7' => 'Khách',
	'init_group_8' => 'Chờ xác nhận',
	'init_group_9' => 'Khách/Chưa kích hoạt',
	'init_group_10' => 'Thành viên mới',
	'init_group_11' => 'Thành viên',
	'init_group_12' => 'Thành viên năng nổ',
	'init_group_13' => 'Thành viên nhiệt tình',
	'init_group_14' => 'Thành viên sáng giá',
	'init_group_15' => 'Thành viên gắn bó',

	'init_rank_1' => 'Tập viết',
	'init_rank_2' => 'Học sinh',
	'init_rank_3' => 'Sinh viên',
	'init_rank_4' => 'Tiến sĩ',
	'init_rank_5' => 'Giáo sư',

	'init_cron_1' => 'Xóa hết bài hôm nay',
	'init_cron_2' => 'Xóa thời gian online trong tháng',
	'init_cron_3' => 'Xóa hết dữ liệu ngày',
	'init_cron_4' => 'Thống kê email mừng sinh nhật',
	'init_cron_5' => 'Trả lời thông báo',
	'init_cron_6' => 'Xóa hết thông báo',
	'init_cron_7' => 'Xóa hết kế hoạch',
	'init_cron_8' => 'Làm sạch thúc đẩy diễn đàn',
	'init_cron_9' => 'Xóa hết chủ đề của tháng',
	'init_cron_10' => 'Cập nhật X-Space hàng ngày',
	'init_cron_11' => 'Chủ đề cập nhật hàng tuần',

	'init_bbcode_1' => 'Marquee',
	'init_bbcode_2' => 'Chèn Flash',
	'init_bbcode_3' => 'QQ',
	'init_bbcode_4' => 'Sup',
	'init_bbcode_5' => 'Sub',
	'init_bbcode_6' => 'Chèn file âm thanh',
	'init_bbcode_7' => 'Chèn file video',

	'init_qihoo_searchboxtxt' =>'Nhập từ khóa tìm kiếm',
	'init_threadsticky' =>'Toàn site, Toàn diễn đàn, Toàn mục',

	'init_default_style' => 'Phong cách mặc định',
	'init_default_forum' => 'Diễn đàn mặc định',
	'init_default_template' => 'Mẫu mặc định',
	'init_default_template_copyright' => 'Comsenz (Bắc Kinh)',

	'init_dataformat' => 'Y-n-j',
	'init_modreasons' => 'Quảng cáo/SPAM\r\nVirus\r\nKhông dấu\r\nLạc đề\r\nTrùng bài\r\n\r\nĐồng tình\r\nBài hay\r\nTinh hoa',
	'init_userreasons' => 'Quảng cáo\r\nSPAM\r\nSEX\r\nLạc đề\r\nPhạm quy\r\n\r\nĐồng tình\r\nBài hay\r\nNguyên tác',
	'init_link' => 'Discuz! Diễn đàn chính thức thiết lập và trao đổi kỹ thuật',
	'init_link_note' => 'Cung cấp Discuz mới nhất! Tin tức sản phẩm, tải về và trao đổi kỹ thuật',

	'init_promotion_task' => 'Nhiệm vụ thưởng',
	'init_gift_task' => 'Quà tặng nhiệm vụ',
	'init_avatar_task' => 'Loại hình nhiệm vụ',

	'license' => '<div class="license"><h1>Quy định sử dụng phần mềm Discuz X2</h1>
<b>
<p>Discuz X2 được việt hóa bởi DCV Team www.discuzviet.net</p>

<p>Vui lòng không xóa tên người dịch và liên kết tới www.discuzviet.net</p>
</b>

<p> Bản quyền (c) 2001-2010, Comsenz (Bắc Kinh) Công nghệ Công ty TNHH Tất cả các quyền. </ P>

Cảm ơn bạn đã lựa chọn <p> Discuz Diễn đàn sản phẩm!. Chúng tôi hy vọng rằng những nỗ lực của chúng tôi có thể cung cấp cho bạn một giải pháp diễn đàn nhanh và hiệu quả và mạnh mẽ của cộng đồng. </ P>

<p> Discuz! Anh tên đầy đủ Crossday Discuz Board,! Trung Quốc họ tên Discuz! Diễn đàn, sau đây gọi là Discuz!. </ P>

<p> Comsenz (Bắc Kinh) Công nghệ Công ty TNHH Discuz phát triển sản phẩm,! theo Sản phẩm sở hữu độc lập Discuz Bản quyền! (Quốc gia Trung Quốc Bản quyền quản lý của 2006SR11895 bản quyền số đăng ký). Comsenz (Bắc Kinh) Công nghệ Công ty TNHH tại http://www.comsenz.com, Discuz! Trang mạng chính thức tại http://www.discuz.com, Discuz chính thức diễn đàn về trang web tại http://www.discuz.net. </ P>

<p> Discuz! bản quyền đã được đăng ký tại nước Cộng hòa Quốc gia Trung Quốc Bản quyền quản lý, theo luật bản quyền và các điều ước quốc tế. Người sử dụng: hoặc một cá nhân, tổ chức, lợi nhuận hay không, làm thế nào để sử dụng (kể cả cho mục đích học tập và nghiên cứu), được yêu cầu phải đọc kỹ hợp đồng này, hiểu, đồng ý và tuân theo tất cả các điều khoản của Hiệp định này, trước khi bắt đầu sử dụng Discuz ! phần mềm. </P>

<p> cho các thỏa thuận cấp phép và chỉ áp dụng Discuz X phiên bản!, Comsenz (Bắc Kinh) Công nghệ Công ty TNHH có quyền giải thích cuối cùng của thỏa thuận cấp phép. </P>

I. <h3> Giấy phép thỏa thuận quyền </h3>
<ol>
<li> Bạn hoàn toàn có thể thực hiện theo thỏa thuận giấy phép người sử dụng, dựa trên phần mềm được sử dụng trong các mục đích phi thương mại, mà không phải nộp lệ phí cấp giấy phép bản quyền phần mềm. </li>
<li> Thỏa thuận bạn có thể trong các khó khăn và hạn chế để sửa đổi Discuz mã nguồn (nếu có)! hoặc giao diện để phù hợp với yêu cầu trang web của bạn. </li>
<li> Bạn phải sử dụng phần mềm để xây dựng một diễn đàn của tất cả các thông tin thành viên, các bài báo và thông tin liên quan đến quyền sở hữu và nội dung của bài báo độc lập liên kết với các nghĩa vụ pháp lý. </li>
<li> Có được một giấy phép thương mại, bạn có thể sử dụng phần mềm cho thương mại, mua cùng một lúc theo kiểu được xác định trong giai đoạn nhiệm vụ hỗ trợ kỹ thuật, hỗ trợ kỹ thuật, phương pháp và nội dung hỗ trợ kỹ thuật, từ lúc mua, trong khoảng thời gian hỗ trợ kỹ thuật đã được chỉ định bằng cách quy định các dịch vụ hỗ trợ kỹ thuật. người sử dụng thương mại của quyền lực để phản ánh và bình luận về các ý kiến ​​liên quan sẽ được xem xét ban đầu, nhưng không phải đã được thông qua hoặc bảo hành. </li>
</ Ol>

<h3> II. sự thoả thuận của các khó khăn và hạn chế </h3>
<ol>
<li> trước mà không có một giấy phép thương mại, phần mềm có thể không được sử dụng cho mục đích thương mại (bao gồm nhưng không giới hạn các trang web công ty, các trang web kinh doanh, cho mục đích thương mại hoặc trang web để đạt được lợi nhuận). Để mua các thông tin giấy phép, xin vui lòng truy cập vào hướng dẫn http://www.discuz.com, gọi 8610-51657885 cho biết thêm chi tiết. </Li>
<li> không liên kết với các phần mềm hoặc giấy phép thương mại cho thuê, bán, thế chấp, cấp giấy phép phụ. </Li>
<li> mọi trường hợp, mà không có vấn đề làm thế nào sử dụng, đã sửa đổi hoặc cảnh quan, để thay đổi mức độ nào, chỉ cần sử dụng Discuz toàn bộ hoặc một phần, mà không có sự cho phép bằng văn bản của phần cuối trang tại Diễn đàn Discuz!! tên và Comsenz (Bắc Kinh) Công nghệ Công ty TNHH liên kết website (http://www.comsenz.com, http://www.discuz.com hoặc http://www.discuz.net) liên kết phải được giữ lại, và không thể loại bỏ hoặc sửa đổi . </Li>
<li> cấm Discuz! toàn bộ hoặc một phần của cơ sở cho sự phát triển của bất kỳ phiên bản phái sinh, sửa đổi phiên bản hoặc phiên bản của bên thứ ba để phân phối lại. </Li>
<li> Nếu bạn không tuân thủ các điều khoản của Hiệp định này, giấy phép của bạn sẽ được chấm dứt, các quyền của giấy phép sẽ bị thu hồi, và chịu trách nhiệm tương ứng của pháp luật. </Li>
</Ol>

<h3> III. BẢO TNHH VÀ TỪ BỎ </h3>
<ol>
<li> phần mềm và tài liệu đi kèm không có sẵn như là rõ ràng hay ngụ ý, của bất kỳ bồi thường, bảo đảm cung cấp biểu mẫu. </Li>
<li> người dùng tự nguyện sử dụng phần mềm này, bạn phải hiểu những rủi ro của việc sử dụng phần mềm này, dịch vụ kỹ thuật, chưa được mua các sản phẩm, chúng tôi không cam kết cung cấp bất kỳ hình thức hỗ trợ kỹ thuật, sử dụng bảo lãnh, cũng như không chịu trách nhiệm về việc sử dụng của phần mềm này phát sinh từ các vấn đề liên quan đến trách nhiệm. </Li>
<li> Hồng Sing Công ty không sử dụng phần mềm để xây dựng một bài trang web hoặc diễn đàn hoặc chịu trách nhiệm về thông tin, bạn chịu trách nhiệm đầy đủ. </Li>
Sing Sing <li> công ty cung cấp phần mềm và dịch vụ, kịp thời, bảo mật, độ chính xác không đảm bảo, do bất khả kháng, Hồng Sing yếu tố ngoài sự kiểm soát của công ty (bao gồm cả các cuộc tấn công của hacker, dừng điện, vv) gây ra bởi phần mềm sử dụng và đình chỉ hoặc chấm dứt dịch vụ, và cho mất mát của bạn, bạn đồng ý với Sing miễn trừ trách nhiệm doanh nghiệp của tất cả các quyền. </Li>
Sing <li> đặc biệt thu hút sự chú ý của bạn cho công ty, Hồng Sing Công ty để bảo vệ phát triển kinh doanh và điều chỉnh tự chủ, Hồng Sing Công ty tại bất kỳ thời gian có hoặc không có thông báo trước để sửa đổi dịch vụ, đình chỉ hoặc chấm dứt một số hoặc tất cả các phần mềm được sử dụng và quyền dịch vụ, thay đổi sẽ được đăng trên các trang có liên quan của Sing trang web, bao gồm nhưng không thông báo trước. Hồng Công ty Sing để sửa đổi hoặc đình chỉ việc thực hiện, chấm dứt một số hoặc tất cả các quyền của phần mềm và dịch vụ dẫn đến thiệt hại, không có Công ty Hồng Sing cho bạn hoặc bất kỳ bên thứ ba.
</Li>
</Ol>


<p> Sing sản phẩm trên thỏa thuận giấy phép người sử dụng, giấy phép kinh doanh và dịch vụ kỹ thuật cho các chi tiết được cung cấp bởi các Sing Hồng độc quyền. Sing công ty đã không thông báo trước, sửa đổi, quyền phép và giá cả dịch vụ danh sách, thỏa thuận sửa đổi hoặc bảng giá từ các thay đổi từ ngày có hiệu lực của người sử dụng có thẩm quyền mới. </P>
Một khi bạn bắt đầu cài đặt <p> Sing sản phẩm, sẽ được coi là hoàn toàn hiểu và chấp nhận các điều khoản của Hiệp định này, các từ ngữ trong việc thụ hưởng các quyền được cấp cùng một lúc, do các khó khăn liên quan và các hạn chế. Cấp giấy phép thỏa thuận bên ngoài phạm vi của hành vi sẽ là một vi phạm trực tiếp của Hiệp định này Giấy phép và coi là vi phạm, chúng tôi có quyền chấm dứt việc ủy ​​quyền, sẽ được yêu cầu dừng các thiệt hại, và giữ quyền điều tra các trách nhiệm liên quan. </P>
<p> giải thích các điều khoản của giấy phép này có hiệu lực, thỏa thuận, và giải quyết tranh chấp, đối với nước Cộng hòa nhân dân của lục địa của pháp luật. </P>
Sing nếu <p> giữa bạn và tranh chấp hay tranh cãi, đầu tiên cần được giải quyết thông qua hiệp thương hữu nghị, tham vấn không thành công, bạn đồng ý đưa tranh chấp ra Tòa án hoặc tranh cãi Sing Haidian nhân dân huyện, nơi thẩm quyền. Hồng Sing Công ty có quyền giải thích các điều khoản trên và theo ý. </P>
</div>',

	'uc_installed' => 'Bạn đã cài đặt UCenter, nếu bạn muốn cài đặt lại vui lòng xóa tập tin data/install.lock',
	'i_agree' => 'Tôi đã đọc và đồng ý với các điều khoản',
	'supportted' => 'Hỗ trợ',
	'unsupportted' => 'Ko hỗ trợ',
	'max_size' => 'Hỗ trợ/Tối đa',
	'project' => 'Dự án',
	'ucenter_required' => 'Yêu cầu',
	'ucenter_best' => 'Discuz! X2.0',
	'curr_server' => 'Hiện tại',
	'env_check' => 'Kiểm tra',
	'os' => 'OS',
	'php' => 'Bản PHP',
	'attachmentupload' => 'Đính kèm',
	'unlimit' => 'Không giới hạn',
	'version' => 'Phiên bản',
	'gdversion' => 'Bản GD',
	'allow' => 'Hỗ trợ',
	'unix' => 'Unix',
	'diskspace' => 'Đĩa cứng',
	'priv_check' => 'Thư mục, tập tin',
	'func_depend' => 'Kiểm tra',
	'func_name' => 'Tên',
	'check_result' => 'Kết quả',
	'suggestion' => 'Khuyến nghị',
	'advice_mysql' => 'Kiểm tra chắc chắn các module mysql ko bị lỗi',
	'advice_fopen' => 'Chức năng này yêu cầu mở hàm allow_url_fopen trong php.ini.',
	'advice_file_get_contents' => 'Sửa trong php.ini hàm allow_url_fopen sang On để có thể cài đặt.',
	'advice_xml' => 'Chức năng này yêu cầu có hỗ trợ XML trong PHP',
	'none' => 'Rỗng',


	'dbhost' => 'Máy chủ CSDL',
	'dbuser' => 'Tài khoản CSDL',
	'dbpw' => 'Mật khẩu CSDL',
	'dbname' => 'Tên CSDL',
	'tablepre' => 'Tiền tố',

	'ucfounderpw' => 'Mật khẩu',
	'ucfounderpw2' => 'Nhập lại',

	'init_log' => 'Khởi tạo Log',
	'clear_dir' => 'Thư mục trống',
	'select_db' => 'Chọn CSDL',
	'create_table' => 'Tạo bảng',
	'succeed' => 'Thành công ',

	'testdata' => 'Dữ liệu mẫu',
	'testdata_check_label' => 'Cài dữ liệu mẫu Portal',
	'portalstatus' => 'Mở cửa chức năng',
	'portalstatus_check_label' => '',
	'groupstatus' => 'Mở nhóm',
	'groupstatus_check_label' => '',
	'homestatus' => 'Mở mạng xã hội',
	'homestatus_check_label' => '',
	'install_data' => 'Dữ liệu đang được cài đặt',
	'install_test_data' => 'Các dữ liệu đang được cài đặt',

	'method_undefined' => 'Không xác định phương pháp',
	'database_nonexistence' => 'CSDL không tồn tại',
	'skip_current' => 'Bỏ qua bước này',
	'topic' => 'Chủ đề',
);

$msglang = array(
	'config_nonexistence' => 'File cấu hình config.inc.php không tồn tại, kiểm tra lại, hoặc tải lên file mới!',
);

?>
<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *		Translate by DCV team - http://www.discuzviet.net
 *      $Id: lang_email.php 20525 2011-02-25 04:25:21Z congyushuai $
 */


$lang = array
(
	'hello' => 'Chào bạn',
	'moderate_member_invalidate' => 'Thành viên vô hiệu',
	'moderate_member_delete' => 'Xóa',
	'moderate_member_validate' => 'Bởi',


	'get_passwd_subject' =>		'Trợ giúp Lấy mật khẩu',
	'get_passwd_message' =>		'
<p>{username},
Thư này gửi từ {bbname} .</p>

<p>Bạn nhận được tin nhắn này vì địa chỉ email này đã được dùng để đăng ký thành viên tại {bbname} </p>
<p>
----------------------------------------------------------------------<br />
<strong>Quan trọng!</strong><br />
----------------------------------------------------------------------</p>

<p>Nếu bạn không yêu cầu đặt lại mật khẩu tại {bbname} xin vui lòng bỏ qua
Và xóa tin nhắn này. Chỉ khi bạn cần phải lấy lại mật khẩu, cần phải tiếp tục đọc phần sau đây
Nội dung.</p>
<p>
----------------------------------------------------------------------<br />
<strong>Hướng dẫn đặt lại mật khẩu</strong><br />
----------------------------------------------------------------------</p>
</p>
Bạn có ba ngày kể từ ngày yêu cầu đổi mật khẩu. Hãy nhấp vào liên kết dưới đây, quá hạn trên, yêu cầu đổi mật khẩu của bạn sẽ bị hủy bỏ:<br />

<a href="{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}" target="_blank">{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}</a>
<br />
(Nếu liên kết trên ko hoạt động, vui lòng copy nó và dán vào khung địa chỉ trình duyệt của bạn!)</p>

<p>Trong trang mới mở ra. Nhập mật khẩu mới của bạn. Xác nhận, và bạn có thể sử dụng mật khẩu mới để đăng nhập.
Chú ý, người quản trị có thể sửa đổi mật khẩu giúp bạn.</p>

<p>Yêu cầu gửi bởi IP: {clientip}</p>


<p>
Trân trọng!<br />
</p>
<p>BQT {bbname}.
{siteurl}</p>',


	'email_verify_subject' =>	'Xác minh Địa chỉ Email',
	'email_verify_message' =>	'
<p>{username},
Thư này gửi từ {bbname} .</p>

<p>Bạn nhận được email này, là do bạn là Người đăng ký, hoặc đổi lại địa chỉ email tại {bbname}. Nếu như không phải bạn đăng ký tại {bbname}, xin vui lòng bỏ qua thông báo này nếu bạn thấy phiền.</p>
<br />
----------------------------------------------------------------------<br />
<strong>Hướng dẫn kích hoạt tài khoản</strong><br />
----------------------------------------------------------------------<br />

<p>Nếu bạn là một người dùng mới đăng kí tại {bbname}, hoặc sửa đổi địa chỉ Email của bạn, chúng tôi cần xác minh tính hợp lệ của địa chỉ của bạn để tránh spam email hoặc bị lạm dụng.</p>

<p>Chỉ cần nhấp vào liên kết dưới đây để kích hoạt tài khoản của bạn:<br />

<a href="{url}" target="_blank">{url}</a>
<br />
(Nếu liên kết trên ko hoạt động, vui lòng copy nó và dán vào khung địa chỉ trình duyệt của bạn!)</p>

<p>Cảm ơn sự ghé thăm của bạn, chúc bạn hạnh phúc!</p>


<p>
Trân trọng!<br />

BQT {bbname}.<br />
{siteurl}</p>',

	'add_member_subject' =>		'Thêm 1 thành viên mới',
	'add_member_message' => 	'
{newusername} ,
Thư này gửi từ {bbname} .

Tôi là {adminusername}, Quản trị viên của {bbname}. Bạn nhận được thư này vì bạn gia nhập thành viên của website {bbname}, địa chỉ Email được dùng để đăng kí!

----------------------------------------------------------------------
Quan trọng!
----------------------------------------------------------------------

Nếu bạn không quan tâm đến {bbname} hoặc không muốn trở thành thành viên, xin vui lòng bỏ qua thư này.

----------------------------------------------------------------------
Thông tin tài khoản
----------------------------------------------------------------------

Site Name: {bbname}
Địa chỉ trang web: {siteurl} SITEURL

Tên: {newusername}
Mật khẩu: {newpassword}

Từ bây giờ, bạn có thể sử dụng đăng tài khoản trên để đăng nhập {bbname}, chúc bạn hạnh phúc!



Trân trọng!

BQT {bbname}.
{siteurl}',


	'birthday_subject' =>		'Chúc mừng Sinh nhật',
	'birthday_message' => 		'
{username},
Thư này gửi từ {bbname} .

Bạn nhận được tin nhắn này vì địa chỉ email này được dùng để đăng kí thành viên tại {bbname},
Và theo thông tin bạn điền vào, hôm nay là sinh nhật của bạn. Thay mặt cho đội ngũ quản lý {bbname}, chân thành gửi đến bạn một lời chúc mừng Sinh nhật. Chúc bạn có một Sinh nhật vui vẻ, đầm ấm và hạnh phúc.

Nếu bạn không phải là thành viên của {bbname}, hay hôm nay không phải ngày sinh nhật của bạn, có thể là email của bạn
đã bị lạm dụng, hoặc điền sai Sinh nhật, xin vui lòng bỏ qua Email này.
Thông báo.


Trân trọng!

BQT {bbname}.
{siteurl}',

	'email_to_friend_subject' =>	'{$_G[member][username]} giới thiệu bạn: $thread[subject]',
	'email_to_friend_message' =>	'
Thư này gửi từ thành viên {$_G[member][username]} của {$_G[setting][bbname]}.

Bạn nhận được Email này là do thành viên {$_G[member][username]} của {$_G[setting][bbname]} sử dụng chức năng giới thiệu bạn bè với những nội dung đề nghị dưới đây cho bạn,nếu bạn không quan tâm, vui lòng bỏ qua thư này. Bạn không cần hủy bỏ đăng kí hoặc làm thêm bất cứ điều gì.

----------------------------------------------------------------------
Nội dung
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
Hết.
-------------------------------------------------- --------------------

Xin lưu ý rằng bức thư này được người dùng sử dụng chức năng "Giới thiệu với bạn bè" để gửi, không phải từ trang web của thư chính thức,
Đội ngũ quản lý trang web sẽ chịu trách nhiệm cho các tin nhắn như vậy.

Chào mừng đến với {$_G[setting][bbname]}
$_G[siteurl]',

	'email_to_invite_subject' =>	'Bạn của bạn: {$_G[member][username]} gửi một mã mời tham gia {$_G[setting][bbname]} đến bạn',
	'email_to_invite_message' =>	'
$sendtoname,
Thư này gửi từ thành viên {$_G[member][username]} của {$_G[setting][bbname]}.

Bạn nhận được Email này là do thành viên {$_G[member][username]} đến từ {bbname} sử dụng chức năng "Gửi mã mời bạn bè" với những nội dung đề nghị dưới đây cho bạn,nếu bạn không quan tâm, vui lòng bỏ qua thư này. Bạn không cần hủy bỏ đăng kí hoặc làm thêm bất cứ điều gì.

----------------------------------------------------------------------
Nội dung:
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
Hết.
----------------------------------------------------------------------

Xin lưu ý rằng bức thư này được người dùng sử dụng chức năng "Gửi mã mời bạn bè" để gửi, không phải từ trang web của thư chính thức,
Đội ngũ quản lý trang web sẽ chịu trách nhiệm cho các tin nhắn như vậy.

Chào mừng đến với {$_G[setting][bbname]}
$_G[siteurl]',


	'moderate_member_subject' =>	'Thông báo cho người sử dụng kết quả kiểm duyệt',
	'moderate_member_message' =>	'
<p>{username} ,
Thư này gửi từ {bbname} .</p>

<p>Bạn nhận được tin nhắn này vì địa chỉ email này được sử dụng để đăng kí thành viên mới tại {bbname}. Ban quản trị cần thiết phải xem xét hướng dẫn người sử dụng mới, tin nhắn sẽ thông báo cho bạn để gửi Ứng dụng kết quả kiểm duyệt.</p>

----------------------------------------------------------------------<br />
<strong>Thông tin đăng ký và kết quả kiểm duyệt</strong><br />
----------------------------------------------------------------------<br />

Tên: {username}<br />
Ngày đăng kí: {regdate}<br />
Ngày gửi: {submitdate}<br />
Lần gửi: {submittimes}<br />
Nội dung: {message}<br />
<br />
Kết quả: {modresult}<br />
Ngày kiểm duyệt: {moddate}<br />
Quản trị viên: {adminusername}<br />
Webmaster: {remark}<br />
<br />
----------------------------------------------------------------------<br />
<strong>Kết quản kiểm duyệt cho thấy</strong><br />
----------------------------------------------------------------------<br />

<p>Duyệt: đăng ký của bạn đã được chấp thuận, bạn trở thành một người sử dụng chính thức tại {bbname}.</p>

<p>Từ chối: thông tin đăng ký của bạn không đầy đủ, hoặc chưa đáp ứng yêu cầu của chúng tôi cho một người dùng mới, bạn có thể <a href="home.php?mod=spacecp&ac=profile" target="_blank">Hoàn tất thông tin đăng ký</a>,rồi gửi lại lần nữa.</p>

<p>Xóa: Yêu cầu đăng kí của bạn không phù hợp và không được chấp thuận. Tài khoản của bạn bị xóa khỏi hệ thống. Tài khoản này có thể được tái sử dụng bởi người dùng khác.</p>

<br />
<br />
Trân trọng!<br />
<br />
BQT {bbname}.<br />
{siteurl}',

	'adv_expiration_subject' =>	'Quảng cáo của bạn sẽ hết hạn ngày {day},vui lòng kiểm tra lại',
	'adv_expiration_message' =>	'Các Quảng cáo của bạn trên trang web sẽ hết hạn ngày {day},xin vui lòng giải quyết: <br /><br />{advs}',
	'invite_payment_email_message' => '
Chào mừng đến với {bbname}（{siteurl}）,phí bạn trả quảng cáo đã kết thúc{orderid} và quảng cáo đã hết hiệu lực.<br />
<br />----------------------------------------------------------------------<br />
Đây là những gì bạn nhận được mã mời!
<br />----------------------------------------------------------------------<br />

{codetext}

<br />----------------------------------------------------------------------<br />
Quan trọng!
<br />----------------------------------------------------------------------<br />',
);

?>
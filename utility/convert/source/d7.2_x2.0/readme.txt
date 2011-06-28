====================================
Discuz! 7,2 nâng cấp lên Discuz! X2.0
====================================
Hỗ trợ: http://traitimyenbai.net

Tôi chuẩn bị để nâng cấp
---------------
1. Thiết lập các thủ tục backup dữ liệu
2. Thư mục diễn đàn cũ giữ nguyên
3. Tải lên sản phẩm Discuz! X2 việt hóa lên host
4. Cài đặt Forum X2
   Bạn cần nâng cấp Ucenter của bản 7.2 lên phiên bản 1.6.0 trước khi cài đặt X2. Download tại đây http://traitimyenbai.net/forum/thread-update-ucenter-1-6-0-viet-hoa-64115-1-1.html

Diễn đàn nâng cấp dữ liệu II
---------------
1 cài đặt, thử nghiệm diễn đàn có thể chạy sau khi tải lên Discuz! X Chuyển đổi chương trình vào thư mục forum hơn
2 Điều hành / chuyển đổi
3 Chọn phiên bản thích hợp của chương trình, để bắt đầu chuyển đổi
4 quá trình chuyển đổi không phải là không gián đoạn, cho đến khi chương trình tự động thực thi.
5. Chuyển đổi quá trình có thể mất nhiều thời gian, và tiêu thụ tài nguyên máy chủ nhiều hơn, bạn nên chọn các máy chủ thời gian thực hiện miễn phí

Nâng cấp III được hoàn tất, chúng ta cần làm một vài điều
--------------------------
1 Chỉnh sửa các diễn đàn mới config / config_global.php tập tin, thiết lập các sáng lập.
   Trong config / config_global.php tập tin, thiết lập $ _config ['admincp'] ['sáng lập'] = '1 '; số UID cho người sáng lập
(2) truy cập trực tiếp đến nền của diễn đàn mới, hãy truy cập địa chỉ: http:// đến tên miền của bạn / admin.php
3 Sử dụng đăng nhập tài khoản người sáng lập, cập nhật bộ nhớ cache vào nền
4 Hệ thống mới này cho biết thêm nhiều dự án thiết lập, bao gồm cả quyền sử dụng, quyền hạn của nhóm, phần diễn đàn và như vậy, bạn cần phải cẩn thận tái thiết lập một lần
5 Chuyển các file đính kèm thư mục cũ (trước khi chuyển giao, bài viết của bạn sẽ không thể tìm thấy bất kỳ phụ kiện)
   a) truy cập vào tuổi / kèm file / thư mục
   b) tất cả các file vào thư mục diễn đàn mới / dữ liệu / đính kèm / forum / thư mục
6 chuyển giao người sử dụng (người dùng không cần cài đặt riêng biệt UCenter bước này)
   a) truy cập vào tuổi / uc_server / data / avatar thư mục /
   b) tất cả các tập tin vào các cửa hàng của diễn đàn mới uc_server / data / avatar /
7 Xóa các chương trình chuyển đổi, để không mang đến rủi ro cài đặt diễn đàn của bạn
8 mới diễn đàn để được kiểm tra tất cả các chức năng được bình thường, bạn có thể xóa các sao lưu cũ và thủ tục sao lưu dữ liệu
9 Nếu bạn đã sử dụng thông tin phân loại, phân loại thông tin cần phải được làm mới một lần (nền -> Update Thống kê -> phân loại thông tin đối chiếu)..
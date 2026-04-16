# KỊCH BẢN DEMO BẢO VỆ ĐỒ ÁN - HỆ THỐNG ĐẶT TOUR DU LỊCH
## Thời gian: 30 phút | 3 vai trò: Khách hàng, Admin, Hướng dẫn viên

---

## 🎬 PHẦN MỞ ĐẦU (2 phút)

> "Kính chào quý thầy cô và các bạn. Chúng em xin được trình bày đồ án tốt nghiệp với đề tài: **Hệ thống đặt tour du lịch trực tuyến**.
>> 
>> Đây là một hệ thống web hoàn chỉnh, phục vụ cho cả khách hàng đặt tour trực tuyến và đội ngũ quản lý, điều hành tour hàng ngày. Hệ thống được xây dựng bằng Laravel framework với các tính năng chính:
>> 
>> - Đặt tour và thanh toán trực tuyến qua MOMO, VNPay
>> - Quản lý và điều hành tour: gán hướng dẫn viên, gán xe, chốt đoàn
>> - Check-in khách hàng tại điểm đón
>> - Báo cáo và thống kê doanh thu
>> 
>> Hôm nay, chúng em sẽ demo hệ thống theo 3 vai trò: Khách hàng, Admin, và Hướng dẫn viên. Thời gian trình bày là 30 phút."

---

## 📌 PHẦN 1: LUỒNG KHÁCH HÀNG ĐẶT TOUR (9 phút)
Đây là luồng nghiệp vụ chính của hệ thống

---

### 1.1 Trang chủ và Tìm kiếm Tour (1.5 phút)

> "Đầu tiên, chúng em xin giới thiệu giao diện trang chủ của hệ thống.
>> (Mở trang chủ)
>> Đây là trang chủ của hệ thống đặt tour du lịch. Khách hàng có thể thấy ngay các tour nổi bật, tour khuyến mãi và menu điều hướng phía trên.
>> (Di chuột qua menu)
>> Menu chính bao gồm: Trang chủ, Tours, Đặt tour của tôi, Về chúng tôi, và Liên hệ.
>> Bây giờ, giả sử một khách hàng muốn tìm tour du lịch. Họ sẽ click vào một tour nổi bật hoặc vào mục Tours.
>> (Click vào một tour)
>> Đây là trang chi tiết tour. Khách hàng có thể xem đầy đủ thông tin bao gồm: ảnh tour, mô tả chi tiết, lịch trình từng ngày, giá cả, và quan trọng nhất là các ngày khởi hành có sẵn.
>> (Chỉ vào phần ngày khởi hành)
>> Đây là điểm quan trọng về nghiệp vụ. Hệ thống chỉ hiển thị các ngày khởi hành thỏa mãn 2 điều kiện: thứ nhất, tour chưa được chốt đoàn - tức là còn nhận booking; thứ hai, ngày khởi hành phải cách ngày hiện tại ít nhất 3 ngày. Quy định này giúp công ty có thời gian chuẩn bị: gán hướng dẫn viên, gán xe, in danh sách khách. Khách hàng không thể đặt tour quá gần ngày đi.
>> (Chỉ vào một tour hết lịch trình nếu có)
>> Nếu tất cả các ngày khởi hành đã qua, hệ thống sẽ hiển thị badge 'Hết lịch trình' đè lên ảnh tour, và nút 'Đặt ngay' sẽ chuyển thành 'Xem lịch cũ'."

---

### 1.2 Đăng nhập và Đặt Tour (4.5 phút)

> "Khi khách hàng quyết định đặt tour, họ cần đăng nhập vào hệ thống.
>> (Click nút Đăng nhập)
>> Nếu chưa có tài khoản, khách hàng có thể đăng ký mới tại đây. Hôm nay chúng em sẽ đăng nhập bằng tài khoản khách hàng đã có sẵn.
>> (Nhập thông tin đăng nhập)
>> Đăng nhập thành công! Bây giờ khách hàng có thể tiến hành đặt tour.
>> (Quay lại trang tour, click Đặt tour)
>> Đây là trang đặt tour. Chúng em xin giới thiệu quy trình đặt tour với các bước như sau:
>> 
>> **Bước 1: Chọn ngày khởi hành**
>> (Click dropdown ngày khởi hành)
>> Hệ thống hiển thị các ngày khởi hành còn chỗ. Mỗi ngày sẽ hiển thị số chỗ còn trống trên tổng số chỗ. Ví dụ: 20/01/2026 còn 29 trên 29 chỗ.
>> (Chọn một ngày)
>> 
>> **Bước 2: Chọn số lượng hành khách**
>> Ở đây có quy định nghiệp vụ quan trọng mà chúng em xin demo:
>> (Đọc quy định)
>> - Một người lớn đi kèm tối đa 2 trẻ em
>> - Trẻ em phải đi cùng người lớn
>> - Người lớn là từ 12 tuổi trở lên
>> Bây giờ, chúng em sẽ demo tính năng validate. Giả sử khách hàng chọn 1 người lớn và 3 trẻ em.
>> (Nhập 1 người lớn, 3 trẻ em)
>> Như quý thầy cô thấy, hệ thống báo lỗi ngay lập tức: 'Tối đa 2 trẻ em cho 1 người lớn'. Đây là validate realtime, không cần submit form.
>> (Sửa lại 2 trẻ em)
>> Khi sửa đúng quy định, lỗi sẽ biến mất và khách hàng có thể tiếp tục.
>> 
>> **Bước 3: Xem tóm tắt giá**
>> (Chỉ vào phần tóm tắt bên phải)
>> Bên phải màn hình là phần tóm tắt giá được tính tự động. Hệ thống hiển thị chi tiết:
>> - Người lớn: số lượng nhân giá mỗi người
>> - Trẻ em: số lượng nhân giá trẻ em
>> - Em bé: miễn phí
>> - Dịch vụ thêm: bảo hiểm, đón sân bay, phòng đơn, tip HDV (nếu có)
>> - Mã giảm giá: nếu áp dụng
>> - Tổng cộng
>> Giá được cập nhật realtime khi thay đổi số lượng hoặc chọn dịch vụ thêm.
>> 
>> **Bước 4: Điền thông tin hành khách**
>> (Scroll xuống phần thông tin hành khách)
>> Hệ thống tự động tạo form nhập thông tin cho từng hành khách. Với 1 người lớn và 2 trẻ em, sẽ có 3 form tương ứng.
>> (Điền thông tin: họ tên, giới tính, năm sinh, CCCD)
>> Thông tin này sẽ được lưu để phục vụ việc mua bảo hiểm và điểm danh khi khởi hành. Dựa trên năm sinh, hệ thống tự động phân loại người lớn hay trẻ em.

>> 
>> **Bước 5: Chọn dịch vụ thêm (tùy chọn)**
>> (Scroll xuống phần dịch vụ thêm)
>> Khách hàng có thể chọn các dịch vụ bổ sung như bảo hiểm du lịch, đón sân bay, phòng đơn, hoặc tip hướng dẫn viên. Tất cả đều được tính vào tổng tiền.
>> 
>> **Bước 6: Áp dụng mã giảm giá (nếu có)**
>> (Nhập mã giảm giá)
>> Nếu có mã giảm giá, khách hàng nhập vào đây. Hệ thống sẽ kiểm tra mã có hợp lệ không, còn hạn không, và tự động tính toán giảm giá ngay lập tức.
>> 
>> **Bước 7: Xác nhận đặt tour**
>> (Click nút Đặt tour)
>> Đặt tour thành công! Đây là điểm khác biệt quan trọng của hệ thống: booking sẽ được tự động xác nhận ngay lập tức, không cần admin phê duyệt. Khách hàng có thể thanh toán luôn mà không cần chờ đợi. Hệ thống tự động chuyển đến trang chi tiết đơn hàng."

---

### 1.3 Xem Đơn hàng và Thanh Toán (3 phút)

> "Sau khi đặt tour, đơn hàng sẽ ở trạng thái 'Chưa thanh toán' (Confirmed).
>> (Chỉ vào trạng thái)
>> Lúc này, khách hàng có thể xem chi tiết đơn hàng và tiến hành thanh toán ngay.
>> (Chỉ vào từng phần)
>> Trang chi tiết đơn hàng hiển thị đầy đủ thông tin:
>> - Thông tin tour: tên tour, ngày khởi hành, thời gian
>> - Danh sách hành khách: họ tên, loại (người lớn/trẻ em/em bé), năm sinh, CCCD
>> - Chi tiết thanh toán:
>>   - Người lớn: 2 người × 5.900.000đ = 11.800.000đ
>>   - Trẻ em: 1 người × 4.000.000đ = 4.000.000đ
>>   - Dịch vụ thêm: 200.000đ
>>   - Giảm giá: -1.500.000đ
>>   - Tổng cộng: 14.500.000đ
>> Bây giờ khách hàng sẽ tiến hành thanh toán.
>> (Tick đồng ý điều khoản nếu có)
>> Trước khi thanh toán, khách hàng cần đồng ý với điều khoản thanh toán.
>> Hệ thống hỗ trợ 2 phương thức thanh toán online: MOMO và VNPay.
>> (Click thanh toán MOMO hoặc VNPay)
>> Hệ thống chuyển sang cổng thanh toán tương ứng. Trong môi trường thực tế, khách hàng sẽ nhập thông tin thẻ hoặc quét mã QR tại đây.
>> (Demo thanh toán sandbox nếu có, hoặc mô tả)
>> Sau khi thanh toán thành công, đơn hàng sẽ tự động chuyển sang trạng thái 'Đã thanh toán' (Paid) và khách hàng sẽ nhận được email xác nhận.
>> (Quay lại trang đơn hàng - chọn đơn đã Paid)
>> Như vậy là hoàn thành luồng đặt tour và thanh toán của khách hàng."

---

## 📌 PHẦN 2: LUỒNG ADMIN - QUẢN LÝ VÀ ĐIỀU HÀNH (15 phút)
Xử lý booking, quản lý tour, và điều hành tour hàng ngày

---

### 2.1 Dashboard Admin (1 phút)

> "Bây giờ, chúng em xin chuyển sang phần quản trị viên.
>> (Đăng xuất khách hàng, đăng nhập Admin)
>> Đây là trang Dashboard của Admin. Tại đây hiển thị các thống kê tổng quan:
>> (Chỉ vào từng phần)
>> - Tổng số booking trong ngày, tuần, tháng
>> - Doanh thu: từ website, từ sale (Zalo/Facebook/Điện thoại)
>> - Số tour đang chạy và sắp khởi hành
>> - Biểu đồ doanh thu theo thời gian
>> - Danh sách booking gần đây
>> (Chỉ vào nút 'Xem trong quản lý đặt tour')
>> Một tính năng mới là nút 'Xem trong quản lý đặt tour' - khi click vào, hệ thống sẽ tự động filter và scroll đến đúng ngày khởi hành của booking đó, giúp admin tìm kiếm nhanh chóng."

---

### 2.2 Tạo Tour Mới (3 phút)

> "Trước khi có booking, admin cần tạo tour và lịch khởi hành. Đây là công việc quan trọng nhất của admin.
>> (Vào menu Quản lý Tour, click 'Thêm tour mới')
>> Đây là form tạo tour mới. Admin cần điền đầy đủ thông tin:
>> (Chỉ vào từng trường)
>> - Thông tin cơ bản: Tên tour, Mô tả, Địa điểm, Thời gian (số ngày, số đêm)
>> - Danh mục: chọn danh mục tour (ví dụ: Du lịch trong nước, Du lịch nước ngoài)
>> - Giá: Giá người lớn, Giá trẻ em, Giá em bé
>> - Upload ảnh: Admin có thể upload nhiều ảnh cho tour
>> - Lịch trình: Admin có thể thêm lịch trình từng ngày ngay khi tạo tour, hoặc thêm sau
>> (Điền thông tin mẫu)
>> Ví dụ: Tour Ninh Bình - Hạ Long 2 ngày 1 đêm, giá người lớn 5.900.000đ, giá trẻ em 4.000.000đ.
>> (Click 'Lưu tour')
>> Tour đã được tạo thành công! Bây giờ admin cần tạo lịch khởi hành cho tour này."

---

### 2.3 Quản lý Lịch Khởi hành (4 phút)

> "Lịch khởi hành là phần quan trọng nhất trong quản lý tour. Mỗi tour có thể có nhiều ngày khởi hành khác nhau.
>> (Vào menu 'Danh sách lịch khởi hành' hoặc từ Tour Management Hub)
>> Đây là trang quản lý lịch khởi hành. Admin có thể xem tất cả lịch khởi hành của tất cả tour, hoặc filter theo tour cụ thể.
>> (Click 'Thêm lịch khởi hành')
>> Form tạo lịch khởi hành bao gồm:
>> (Chỉ vào từng trường)
>> - Chọn tour: Admin chọn tour từ dropdown
>> - Ngày khởi hành: Chọn ngày và giờ khởi hành
>> - Số chỗ: Tổng số chỗ và số chỗ còn trống (mặc định số chỗ còn trống = tổng số chỗ khi mới tạo)
>> - Giá: Có thể đặt giá riêng cho lịch khởi hành này, hoặc dùng giá mặc định của tour
>> - Điểm đón: Địa điểm đón khách
>> (Điền thông tin và lưu)
>> Ví dụ: Tạo lịch khởi hành ngày 20/01/2026, 29 chỗ, giá 5.900.000đ/người lớn.
>> (Quay lại danh sách)
>> Sau khi tạo, lịch khởi hành sẽ hiển thị trong danh sách với các thông tin:
>> (Chỉ vào từng cột)
>> - ID lịch khởi hành
>> - Tour và ngày khởi hành
>> - Trạng thái: Đang bán, Sắp khởi hành, Đang chạy, Đã chốt, Đã kết thúc (tự động tính theo ngày)
>> - Số chỗ: đã đặt / tổng số chỗ
>> - Giá
>> - Thao tác: Xem chi tiết, Sửa, Xóa
>> (Click 'Sửa' trên một lịch khởi hành)
>> Admin có thể sửa thông tin lịch khởi hành: thay đổi ngày, số chỗ, giá, hoặc điểm đón. Điều này rất hữu ích khi có thay đổi về lịch trình.
>> (Click 'Xem chi tiết')
>> Trang chi tiết lịch khởi hành hiển thị đầy đủ thông tin: thông tin tour, danh sách booking, hướng dẫn viên được gán, xe được gán, và lịch trình chi tiết."

---

### 2.4 Quản lý Đặt Tour - Trung tâm Điều hành (4 phút)

> "Công việc quan trọng nhất của Admin là quản lý đặt tour và điều hành tour.
>> (Vào menu Quản lý Đặt Tour)
>> Đây là trang quản lý đặt tour, trung tâm điều hành của hệ thống. Dữ liệu được nhóm theo tour và ngày khởi hành, mỗi dòng hiển thị:
>> (Chỉ vào từng cột)   
>> - Ngày khởi hành 
>> - Tour & Khách: tên tour, số booking, tổng số khách
>> - Số lượng (L/T/E): người lớn / trẻ em / em bé
>> - Doanh thu
>> - Phụ trách / HDV: tên HDV và số khách đã đặt / tổng số chỗ xe
>> - Trạng thái: Đang chạy, Sắp khởi hành, Đang bán, Đã chốt, Đã kết thúc
>> - Thao tác: Danh sách khách, Đổi HDV, Đổi xe, Chốt đoàn, Kết thúc tour
>> 
>> **Filter và Tìm kiếm:**
>> (Click vào ô tìm kiếm)
>> Admin có thể tìm kiếm theo tên tour hoặc filter theo trạng thái: Đang chạy, Sắp khởi hành, Đang mở bán, Đã chốt, hoặc Đã kết thúc.
>> (Chọn một filter)
>> Hệ thống tự động sắp xếp: tour đang chạy và sắp khởi hành lên trên, tour đã kết thúc xuống dưới. Điều này giúp admin ưu tiên xử lý các tour quan trọng.
>> 
>> **Xem Danh sách Khách hàng:**
>> (Click nút 'Danh sách' trên một tour)
>> Khi click nút 'Danh sách', hệ thống hiển thị bảng tổng hợp tất cả khách hàng của tour và ngày khởi hành đó. Bảng này rất hữu ích cho hướng dẫn viên, vì nó tập hợp khách từ nhiều booking khác nhau vào một danh sách duy nhất.
>> (Chỉ vào các cột)
>> Bảng hiển thị: STT, Họ tên, Loại khách (L/T/E), Năm sinh, Booking gốc, Trạng thái check-in.
>> (Chỉ vào dòng tổng kết)
>> Ở cuối bảng có dòng tổng kết: tổng số khách, số người lớn, trẻ em, và em bé. Admin có thể in danh sách này để giao cho hướng dẫn viên.
>> (Click Quay lại)
>> 
>> **Trạng thái Tour và Cảnh báo:**
>> (Chỉ vào cột Trạng thái)
>> Trạng thái tour được tính toán real-time dựa trên ngày khởi hành. Nếu hôm nay là ngày khởi hành, trạng thái là 'Đang chạy'. Nếu còn 1 đến 3 ngày nữa, trạng thái là 'Sắp khởi hành'. Nếu còn hơn 3 ngày, trạng thái là 'Đang bán'. Và nếu đã qua ngày khởi hành, trạng thái là 'Đã kết thúc'.
>> (Chỉ vào các badge cảnh báo)
>> Hệ thống có các badge cảnh báo thông minh:
>> - Badge màu đỏ 'CẦN CHỐT ĐOÀN' xuất hiện khi tour còn 3 ngày hoặc ít hơn nhưng chưa được chốt
>> - Badge màu xanh 'Đủ điều kiện chạy' xuất hiện khi tour còn 3 ngày hoặc ít hơn và đã có ít nhất 10 khách
>> - Badge màu đỏ 'Cần đàm phán/Hủy' xuất hiện khi tour còn 3 ngày hoặc ít hơn nhưng chưa đủ 10 khách"

---

### 2.3 Điều hành Tour - Gán HDV, Xe, Chốt Đoàn (4 phút)

> "Tiếp theo, chúng em xin demo các tính năng điều hành tour.
>> 
>> **Đổi Hướng dẫn viên:**
>> (Click icon 'Đổi HDV' trên một tour)
>> Click vào icon 'Đổi HDV' màu xanh dương. Modal hiển thị danh sách các hướng dẫn viên có sẵn - tức là chưa được gán cho tour khác cùng ngày. Điều này tránh xung đột lịch.
>> (Chọn một HDV)
>> Khi chọn một HDV, hệ thống hiển thị thông tin chi tiết: số điện thoại, email. Admin cũng có thể nhập ghi chú đặc biệt cho HDV này, ví dụ: 'Đón khách tại sân bay lúc 8h sáng', hoặc 'Lưu ý khách có dị ứng hải sản'.
>> (Click Xác nhận)
>> Tính năng này rất hữu ích khi có sự cố và cần thay đổi HDV gấp.
>> 
>> **Đổi Xe:**
>> (Click icon 'Đổi xe' trên một tour)
>> Tương tự, click vào icon 'Đổi xe' màu xanh lá. Modal hiển thị danh sách xe có sẵn với thông tin: tài xế, số điện thoại tài xế, công ty, và sức chứa.
>> (Chọn một xe)
>> Một tính năng thông minh: nếu số khách hiện tại vượt quá sức chứa xe, hệ thống sẽ hiển thị cảnh báo màu đỏ và yêu cầu admin xác nhận lại.
>> (Chỉ vào cảnh báo nếu có)
>> Ví dụ: nếu có 35 khách nhưng xe chỉ chứa được 29 chỗ, hệ thống sẽ cảnh báo và yêu cầu admin chọn xe lớn hơn hoặc xác nhận nếu thực sự muốn dùng xe này.
>> (Click Xác nhận)
>> 
>> **Chốt Đoàn:**
>> (Click icon 'Chốt đoàn' trên một tour)
>> Khi tour đã đủ điều kiện, admin có thể chốt đoàn bằng cách click icon 'Chốt đoàn' màu đỏ. Icon này chỉ xuất hiện khi tour còn 3 ngày hoặc ít hơn và chưa được chốt.
>> (Chỉ vào modal)
>> Modal xác nhận hiển thị tổng số khách hiện tại, admin nhập số khách chốt đoàn và xác nhận.
>> (Click Xác nhận)
>> Sau khi chốt, tour sẽ chuyển sang trạng thái 'Đã chốt' và không nhận booking mới nữa. Điều này rất quan trọng vì sau khi chốt, công ty phải cam kết với khách sạn, nhà hàng, và các đối tác khác về số lượng khách chính xác.
>> 
>> **Kết thúc Tour:**
>> (Click icon 'Kết thúc tour' trên một tour)
>> Sau khi tour hoàn thành, admin click icon 'Kết thúc tour' màu đỏ. Modal xác nhận hiển thị thông tin tour, admin có thể nhập ghi chú về việc kết thúc tour, ví dụ: 'Tour đã hoàn thành thành công, khách đã về an toàn'.
>> (Click Xác nhận)
>> Sau khi xác nhận, tour chuyển sang trạng thái 'Đã kết thúc'. Thông tin này sẽ được lưu lại để thống kê và đánh giá sau này."

---

### 2.5 Tạo Booking Thủ công (2 phút)

> "Trong thực tế, không phải tất cả khách hàng đều đặt tour qua website. Nhiều khách đặt qua Zalo, Facebook, hoặc gọi điện thoại trực tiếp. Vì vậy, hệ thống có tính năng tạo booking thủ công cho admin.
>> (Vào menu 'Thêm booking thủ công')
>> Admin chọn tour và ngày khởi hành tương ứng. Hệ thống sẽ hiển thị số chỗ còn lại để admin biết có đủ chỗ không.
>> (Nhập thông tin khách hàng)
>> Admin nhập thông tin khách hàng: họ tên, số điện thoại, email nếu có. Sau đó nhập số lượng: người lớn, trẻ em, em bé.
>> (Chọn nguồn booking)
>> Quan trọng là phải chọn nguồn booking: Zalo, Facebook, hoặc Điện thoại, và gán sale phụ trách nếu có.
>> (Chọn trạng thái thanh toán)
>> Admin có thể chọn trạng thái thanh toán ngay: chưa thanh toán, đã đặt cọc, hoặc đã thanh toán đủ. Nếu đã thanh toán, admin nhập số tiền đã thanh toán và phương thức thanh toán. Điều này rất hữu ích khi khách đặt tour và thanh toán trực tiếp tại văn phòng.
>> (Click Lưu booking)
>> Sau khi điền đầy đủ thông tin, admin click 'Lưu booking'. Booking sẽ được tạo và hiển thị trong danh sách quản lý đặt tour như các booking khác. Điểm khác biệt là booking này có nguồn là Zalo, Facebook, hoặc Điện thoại, giúp admin theo dõi được khách đến từ đâu."

---

## 📌 PHẦN 3: LUỒNG HƯỚNG DẪN VIÊN (4 phút)
Quản lý chuyến đi và check-in khách hàng

---

### 3.1 Dashboard Hướng dẫn viên (1 phút)

> "Bây giờ, chúng em xin demo phần dành cho Hướng dẫn viên.
>> (Đăng xuất Admin, đăng nhập tài khoản Guide)
>> Đây là Dashboard của Hướng dẫn viên. Giao diện đơn giản hơn Admin, tập trung vào các chuyến đi được phân công.
>> (Chỉ vào các phần)
>> - Chuyến đi sắp tới: hiển thị các tour được gán cho HDV
>> - Lịch làm việc: lịch theo tuần/tháng
>> - Thống kê: số tour đã đi, số khách đã phục vụ
>> - Thông báo mới: thông báo về tour mới được gán, thay đổi lịch trình"

---

### 3.2 Xem Chi tiết Chuyến đi (1.5 phút)

> "Hướng dẫn viên click vào chuyến đi để xem chi tiết.
>> (Click vào một chuyến đi)
>> Trang chi tiết hiển thị:
>> (Chỉ vào từng phần)
>> - Thông tin tour: tên tour, lịch trình chi tiết từng ngày
>> - Ngày khởi hành và điểm đón
>> - Thông tin xe: biển số, tài xế, số điện thoại tài xế
>> - Danh sách khách hàng trong đoàn
>> (Chỉ vào danh sách khách)
>> Hướng dẫn viên có thể xem:
>> - Họ tên từng khách
>> - Số điện thoại liên hệ
>> - Loại khách (người lớn/trẻ em/em bé)
>> - Năm sinh
>> - Booking gốc
>> - Ghi chú đặc biệt nếu có (ví dụ: dị ứng thức ăn, yêu cầu đặc biệt)
>> (Chỉ vào nút In danh sách)
>> HDV có thể in danh sách khách ra để mang theo khi đi tour."

---

### 3.3 Check-in Khách hàng (1.5 phút)

> "Tính năng quan trọng của Hướng dẫn viên là Check-in khách hàng.
>> (Vào chức năng Check-in / Điểm danh)
>> Vào ngày khởi hành, HDV sẽ check-in từng khách tại điểm đón.
>> (Chỉ vào danh sách)
>> Danh sách hiển thị tất cả hành khách đã đăng ký. HDV tick xác nhận từng người có mặt.
>> (Tick một vài khách)
>> Khi tick vào một khách, hệ thống tự động ghi nhận:
>> - Thời gian check-in
>> - Địa điểm check-in (mặc định là điểm đón của tour)
>> - Trạng thái: có mặt hoặc vắng mặt
>> Nếu khách nào vắng mặt hoặc có vấn đề, HDV có thể ghi chú.
>> (Nhập ghi chú)
>> Ví dụ: 'Khách đến muộn 15 phút', hoặc 'Khách bị ốm, không thể đi tour'.
>> (Chỉ vào thống kê)
>> Hệ thống tự động cập nhật thống kê: tổng số khách, số khách đã check-in, số khách vắng mặt. Thông tin này được lưu lại và admin có thể xem báo cáo sau."

---

## 📌 PHẦN 4: TỔNG KẾT VÀ Q&A (2 phút)

> "Vừa rồi, chúng em đã demo các luồng nghiệp vụ chính của hệ thống đặt tour du lịch:
>> 
>> **Luồng chính:**
>> - Admin tạo tour mới và quản lý lịch khởi hành
>> - Khách hàng tìm kiếm, đặt tour và thanh toán online
>> - Booking tự động xác nhận, không cần admin duyệt
>> - Admin quản lý và điều hành tour: gán HDV, gán xe, chốt đoàn
>> - Hướng dẫn viên quản lý chuyến đi và check-in khách hàng
>> 
>> **Các tính năng nổi bật:**
>> - Quản lý tour và lịch khởi hành: Tạo tour, thêm nhiều lịch khởi hành, quản lý số chỗ và giá
>> - Tự động hóa cao: booking tự động xác nhận, trạng thái tour tính real-time
>> - Cảnh báo thông minh: 'CẦN CHỐT ĐOÀN', 'Đủ điều kiện chạy', 'Cần đàm phán/Hủy'
>> - Validate nghiệp vụ số lượng hành khách realtime
>> - Tích hợp thanh toán MOMO và VNPay
>> - Hỗ trợ đầy đủ kênh bán hàng: Website, Zalo, Facebook, Điện thoại
>> - Quản lý toàn diện: từ tạo tour, quản lý lịch khởi hành, nhận booking đến kết thúc tour
>> - Check-in khách hàng tại điểm đón
>> 
>> **Điểm mạnh của hệ thống:**
>> - Bảo mật và kiểm soát: khách chỉ thấy tour còn chỗ và chưa chốt, không thể đặt tour quá gần ngày đi
>> - Linh hoạt trong điều hành: đổi HDV, đổi xe, chốt đoàn chỉ bằng vài cú click
>> - Tự động hóa giúp giảm thiểu công việc thủ công và tránh sai sót
>> - Phân quyền rõ ràng: Khách hàng, Admin, Hướng dẫn viên mỗi vai trò có chức năng riêng
>> 
>> Chúng em xin kết thúc phần demo tại đây. Cảm ơn quý thầy cô và các bạn đã lắng nghe!
>> 
>> Chúng em sẵn sàng trả lời các câu hỏi."

---

## 📌 LƯU Ý KHI TRÌNH BÀY

### Văn phong tự nhiên
- Nói như đang giải thích cho thầy cô và các bạn, không quá formal
- Sử dụng các ví dụ thực tế: "ví dụ như...", "trong trường hợp này..."
- Giải thích lý do nghiệp vụ: "tại sao lại làm như vậy", "điều này giúp..."

### Thao tác và Giải thích
- Thực hiện thao tác trước, sau đó giải thích
- Chỉ vào màn hình khi nói về tính năng cụ thể
- Dừng lại 1-2 giây sau mỗi câu quan trọng
- Nhấn mạnh các từ khóa: "tự động", "real-time", "thông minh", "linh hoạt"

### Tốc độ và Ngữ điệu
- Nói rõ ràng, không quá nhanh
- Phần giới thiệu: nhiệt tình, tự tin
- Phần demo: rõ ràng, chậm rãi khi giải thích tính năng
- Phần Q&A: thân thiện, lắng nghe, trả lời chi tiết

### Xử lý tình huống
- Nếu có lỗi kỹ thuật: "Xin lỗi, có vẻ như có một chút vấn đề kỹ thuật. Để chúng em thử lại. Trong thực tế, hệ thống hoạt động rất ổn định, đây chỉ là trường hợp hiếm..."
- Nếu không nhớ: "Để chúng em kiểm tra lại thông tin này. Theo như chúng em nhớ..."
- Nếu câu hỏi khó: "Đây là một câu hỏi hay. Để chúng em suy nghĩ và trả lời chi tiết hơn. Theo nghiệp vụ..."

### Chuẩn bị trước khi demo
1. ✅ Tạo ít nhất 3 tour với các ngày khởi hành khác nhau
2. ✅ Tạo 2-3 booking mẫu với trạng thái khác nhau (chưa thanh toán, đã thanh toán)
3. ✅ Gán HDV và Xe cho một số tour
4. ✅ Chuẩn bị tài khoản test cho thanh toán (nếu có)
5. ✅ Kiểm tra kết nối internet và tốc độ load trang
6. ✅ Chuẩn bị tài khoản cho 3 vai trò: Khách hàng, Admin, Hướng dẫn viên

---

## 🎯 ĐIỂM NHẤN CẦN TRÌNH BÀY

1. **Tự động hóa cao**: Booking tự động xác nhận, trạng thái tour tính real-time, cảnh báo thông minh
2. **Bảo mật và kiểm soát**: Khách chỉ thấy tour còn chỗ và chưa chốt, không thể đặt tour quá gần ngày đi
3. **Linh hoạt trong điều hành**: Đổi HDV, đổi xe, chốt đoàn chỉ bằng vài cú click
4. **Hỗ trợ đầy đủ kênh bán hàng**: Website, Zalo, Facebook, Điện thoại - tất cả trong một hệ thống
5. **Tích hợp thanh toán**: MOMO và VNPay sẵn sàng, không cần cấu hình thêm
6. **Quản lý toàn diện**: Từ nhận booking đến kết thúc tour, tất cả đều được theo dõi và quản lý
7. **Phân quyền rõ ràng**: 3 vai trò với chức năng riêng biệt, đảm bảo bảo mật và hiệu quả

---

**Chúc bạn bảo vệ đồ án thành công! 🎓✨**


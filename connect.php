<?php
// Kết nối đến cơ sở dữ liệu MySQL trong XAMPP
// Cấu trúc: mysqli_connect('Tên_Server', 'Tên_Đăng_Nhập', 'Mật_Khẩu', 'Tên_Cơ_Sở_Dữ_Liệu')
$connect = mysqli_connect('localhost', 'root', '', 'QLNhanSu');

// Kiểm tra xem kết nối có thành công không
if(mysqli_connect_errno() !== 0) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

// Thiết lập font chữ UTF-8 để hiển thị và lưu tiếng Việt không bị lỗi font
mysqli_set_charset($connect, 'utf8mb4');
?>
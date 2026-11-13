<?php
include('connect.php');
if(isset($_POST['btn_them'])) {
    $email = $_POST['admin_email'];
    $pass = $_POST['admin_password'];
    $images = "";

    if(isset($_FILES['images']) && $_FILES['images']['name'] != "") {
        $images = time() . "_" . basename($_FILES['images']['name']);
        move_uploaded_file($_FILES['images']['tmp_name'], "uploads/" . $images);
    }

    $sql = "INSERT INTO Users(admin_email, admin_password, images) VALUES('$email', '$pass', '$images')";
    if(mysqli_query($connect, $sql)) {
        echo "<script>alert('Thêm dữ liệu thành công!'); location.href='admin_index.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }
}
?>
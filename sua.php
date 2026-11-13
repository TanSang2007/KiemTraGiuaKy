<?php
include('connect.php');
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM Users WHERE admin_id = " . $id;
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['btn_sua'])) {
    $email = $_POST['admin_email'];
    $pass = $_POST['admin_password'];
    $images = $_POST['hinh_anh_cu']; 
    
    if(isset($_FILES['images']) && $_FILES['images']['name'] != "") {
        $images = time() . "_" . basename($_FILES['images']['name']);
        move_uploaded_file($_FILES['images']['tmp_name'], "uploads/" . $images);
        
        if($_POST['hinh_anh_cu'] != "" && file_exists("uploads/".$_POST['hinh_anh_cu'])) {
            unlink("uploads/".$_POST['hinh_anh_cu']);
        }
    }
    
    $update_sql = "UPDATE Users SET admin_email='$email', admin_password='$pass', images='$images' WHERE admin_id=$id";
    if(mysqli_query($connect, $update_sql)) {
        echo "<script>alert('Cập nhật thành công!'); location.href='admin_index.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sửa Dữ Liệu Users</title>
    <meta charset="utf-8">
    <style>
        body {font-family: Arial; background-color: #f8f9fa; display: flex; justify-content: center; padding-top: 50px;}
        form {background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px;}
        h2 {text-align: center; color: #333; margin-top: 0;}
        input[type="email"], input[type="text"] {width: 100%; padding: 10px; margin: 8px 0 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        input[type="submit"] {background: #ffc107; color: black; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; font-weight: bold;}
        a {text-decoration: none; color: #dc3545; margin-left: 15px;}
        .img-preview {width: 80px; height: 80px; object-fit: cover; border-radius: 4px; margin-bottom: 10px;}
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Sửa Dữ Liệu Users</h2>
        <label>Email Admin:</label>
        <input type="email" name="admin_email" value="<?php echo htmlspecialchars($row['admin_email']); ?>" required>
        
        <label>Mật khẩu:</label>
        <input type="text" name="admin_password" value="<?php echo htmlspecialchars($row['admin_password']); ?>" required>
        
        <label>Ảnh hiện tại:</label><br>
        <?php if($row['images'] != "") { ?>
            <img src="uploads/<?php echo $row['images']; ?>" class="img-preview"><br>
        <?php } ?>
        
        <label>Chọn Ảnh Mới (để trống nếu không đổi):</label><br><br>
        <input type="file" name="images" accept="image/*">
        <input type="hidden" name="hinh_anh_cu" value="<?php echo $row['images']; ?>"><br><br>
        
        <input type="submit" name="btn_sua" value="Lưu Thay Đổi"> 
        <a href="admin_index.php">Hủy bỏ</a>
    </form>
</body>
</html>
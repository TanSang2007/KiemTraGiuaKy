<!DOCTYPE html>
<html>
<head>
    <title>Thêm Người Dùng (Admin)</title>
    <meta charset="utf-8">
    <style>
        body {font-family: Arial; background-color: #f8f9fa; display: flex; justify-content: center; padding-top: 50px;}
        form {background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px;}
        h2 {text-align: center; color: #333; margin-top: 0;}
        input[type="email"], input[type="password"] {width: 100%; padding: 10px; margin: 8px 0 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        input[type="submit"] {background: #28a745; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer;}
        a {text-decoration: none; color: #dc3545; margin-left: 15px;}
    </style>
</head>
<body>
    <form action="them_xl.php" method="post" enctype="multipart/form-data">
        <h2>Thêm Dữ Liệu Users</h2>
        <label>Email Admin:</label>
        <input type="email" name="admin_email" required>
        
        <label>Mật khẩu:</label>
        <input type="password" name="admin_password" required>
        
        <label>Hình ảnh (Avatar):</label><br><br>
        <input type="file" name="images" accept="image/*" required><br><br>
        
        <input type="submit" name="btn_them" value="Thêm mới"> 
        <a href="admin_index.php">Hủy bỏ</a>
    </form>
</body>
</html>
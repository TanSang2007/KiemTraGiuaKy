<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Phân Hệ Admin (Backend)</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            margin: 0; 
            padding: 40px 20px; 
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .container { 
            max-width: 1100px; 
            margin: 0 auto; 
            background: rgba(255, 255, 255, 0.95); 
            padding: 30px 40px; 
            border-radius: 15px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
        }
        .header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            border-bottom: 2px solid #edf2f7; 
            padding-bottom: 20px; 
            margin-bottom: 25px;
        }
        .header h2 { 
            margin: 0; 
            color: #2d3748; 
            font-weight: 600; 
        }
        .link-frontend {
            color: #4299e1;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 20px;
            background: #ebf8ff;
            transition: all 0.3s ease;
        }
        .link-frontend:hover {
            background: #4299e1;
            color: white;
            box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
        }
        .btn-add { 
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white; 
            padding: 10px 22px; 
            border-radius: 25px; 
            text-decoration: none; 
            font-weight: 500; 
            display: inline-block; 
            margin-bottom: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(72, 187, 120, 0.3);
        }
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(72, 187, 120, 0.4);
        }
        table { 
            width: 100%; 
            border-collapse: separate; 
            border-spacing: 0; 
            background: white; 
            border-radius: 10px; 
            overflow: hidden; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        th, td { 
            padding: 16px; 
            text-align: center; 
            border-bottom: 1px solid #edf2f7; 
        }
        th { 
            background-color: #2d3748; 
            color: white; 
            font-weight: 500; 
            text-transform: uppercase; 
            font-size: 13px; 
            letter-spacing: 0.5px;
        }
        tr { 
            transition: all 0.2s ease; 
        }
        tr:hover { 
            background-color: #f7fafc; 
        }
        tr:last-child td { border-bottom: none; }
        
        img.avatar { 
            width: 55px; 
            height: 55px; 
            object-fit: cover; 
            border-radius: 50%; 
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        tr:hover img.avatar {
            transform: scale(1.15);
            border-color: #4299e1;
        }
        
        .action-btn {
            padding: 7px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
            display: inline-block;
            margin: 0 4px;
        }
        .btn-edit { 
            background: #f6e05e; 
            color: #744210; 
        }
        .btn-edit:hover { 
            background: #d69e2e; 
            color: white; 
            box-shadow: 0 2px 8px rgba(214, 158, 46, 0.4);
        }
        .btn-del { 
            background: #fc8181; 
            color: white; 
        }
        .btn-del:hover { 
            background: #e53e3e; 
            box-shadow: 0 2px 8px rgba(229, 62, 62, 0.4);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Quản Trị Người Dùng (Backend)</h2>
            <a href="frontend.php" class="link-frontend">▶ Xem trang Frontend</a>
        </div>
        
        <a href="them.php" class="btn-add">+ Thêm Dữ Liệu Users</a>
        
        <table>
            <tr>
                <th>Admin ID</th>
                <th>Hình Ảnh</th>
                <th>Email</th>
                <th>Mật Khẩu</th>
                <th>Thao Tác</th>
            </tr>
            <?php 
            include('connect.php');
            $sql = "SELECT * FROM Users";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><strong>#<?php echo $row['admin_id']; ?></strong></td>
                <td>
                    <?php if($row['images'] != "") { ?>
                        <img src="uploads/<?php echo $row['images']; ?>" alt="img" class="avatar">
                    <?php } else { ?>
                        <span style="color: #a0aec0; font-size: 12px;">Chưa có ảnh</span>
                    <?php } ?>
                </td>
                <td style="color: #4a5568; font-weight: 500;"><?php echo htmlspecialchars($row['admin_email']); ?></td>
                <td style="color: #a0aec0;">••••••••</td>
                <td>
                    <a href="sua.php?id=<?php echo $row['admin_id']; ?>" class="action-btn btn-edit">Sửa</a>
                    <a href="xoa.php?id=<?php echo $row['admin_id']; ?>" class="action-btn btn-del" onclick="return confirm('Bạn có chắc muốn xóa User này?');">Xóa</a>
                </td>
            </tr>
            <?php } mysqli_close($connect); ?>
        </table>
    </div>
</body>
</html>
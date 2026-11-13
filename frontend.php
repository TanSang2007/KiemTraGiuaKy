<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Ban Quản Trị</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            margin: 0; 
            padding: 40px 20px; 
            min-height: 100vh;
        }
        
        .header { text-align: center; margin-bottom: 50px; }
        .header h1 { 
            color: #2d3748; 
            font-weight: 700; 
            font-size: 42px; /* Tăng kích thước tiêu đề to hơn */
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.05);
        }
        .header a { 
            display: inline-block;
            padding: 10px 25px; 
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%); 
            color: white; 
            text-decoration: none; 
            border-radius: 30px; 
            font-weight: 500; 
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(66, 153, 225, 0.3);
        }
        .header a:hover { 
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.4); 
        }
        
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .card {
            background: white; 
            border-radius: 16px; 
            text-align: center; 
            box-shadow: 0 10px 20px rgba(0,0,0,0.05); 
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
            padding-bottom: 25px;
        }
        .card:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 15px 30px rgba(0,0,0,0.1); 
        }
        
        .card-banner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            z-index: 1;
        }
        
        .card img { 
            width: 100px; 
            height: 100px; 
            border-radius: 50%; 
            object-fit: cover; 
            border: 4px solid white; 
            margin-top: 30px;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background: white;
        }
        
        .card h3 { 
            margin: 5px 20px; 
            font-size: 16px; 
            color: #2d3748; 
            font-weight: 600;
            word-break: break-word; 
        }
        
        .card p.admin-id { 
            display: inline-block;
            color: #4a5568; 
            font-size: 13px; 
            font-weight: 500;
            background: #edf2f7;
            padding: 5px 15px;
            border-radius: 20px;
            margin-top: 15px;
            border: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- Đã bỏ chữ (Frontend) -->
        <h1>Danh Sách Ban Quản Trị</h1>
        <a href="admin_index.php">Đến trang Backend (Admin)</a>
    </div>

    <div class="grid-container">
        <?php
        include('connect.php');
        
        // Mảng dải màu nền ngẫu nhiên
        $gradients = [
            'linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%)',
            'linear-gradient(135deg, #ff9a9e 0%, #fecfef 99%, #fecfef 100%)',
            'linear-gradient(135deg, #f6d365 0%, #fda085 100%)',
            'linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%)',
            'linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%)',
            'linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%)',
            'linear-gradient(135deg, #cfd9df 0%, #e2ebf0 100%)'
        ];

        $sql = "SELECT * FROM Users";
        $result = mysqli_query($connect, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $random_bg = $gradients[array_rand($gradients)];
        ?>
        <div class="card">
            <div class="card-banner" style="background: <?php echo $random_bg; ?>;"></div>
            
            <?php if($row['images'] != "") { ?>
                <img src="uploads/<?php echo htmlspecialchars($row['images']); ?>" alt="Avatar">
            <?php } else { ?>
                <img src="https://via.placeholder.com/100?text=No+Image" alt="Avatar">
            <?php } ?>
            
            <h3><?php echo htmlspecialchars($row['admin_email']); ?></h3>
            <p class="admin-id">Admin ID: #<?php echo $row['admin_id']; ?></p>
        </div>
        <?php } mysqli_close($connect); ?>
    </div>
</body>
</html>
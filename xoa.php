<?php
include('connect.php');
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $sql_sel = "SELECT images FROM Users WHERE admin_id = $id";
    $res = mysqli_query($connect, $sql_sel);
    $row = mysqli_fetch_assoc($res);
    if($row['images'] != "" && file_exists("uploads/".$row['images'])) {
        unlink("uploads/".$row['images']);
    }
    
    $sql_del = "DELETE FROM Users WHERE admin_id = $id";
    if(mysqli_query($connect, $sql_del)) {
        echo "<script>alert('Xóa thành công!'); location.href='admin_index.php';</script>";
    }
}
?>
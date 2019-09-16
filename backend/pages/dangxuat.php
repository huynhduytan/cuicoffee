<?php
    require_once __DIR__ . '/../../dbconnect.php';
    if(isset($_SESSION['username'])) {
        $_SESSION['username'] = '';
        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:dangnhap.php');
    }

    ?>
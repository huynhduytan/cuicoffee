<?php
    require_once __DIR__ . '/../../dbconnect.php';
    $sp_ma = $_GET['sp_ma'];
    $sqlDelete = "DELETE FROM sanpham WHERE sp_ma = $sp_ma;";
    $resultSelect = mysqli_query($conn, $sqlDelete);
    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:danhsach.php');
?>
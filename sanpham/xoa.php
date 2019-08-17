<?php
require_once __DIR__ . '/../dbconnect.php';
// Lấy dữ liệu cần hiệu chỉnh
$sp_ma = $_GET['sp_ma'];
$sqlDeleteSanPham = "DELETE FROM sanpham WHERE sp_ma = $sp_ma;";
$result = mysqli_query($conn, $sqlDeleteSanPham);
// đường dẫn tương đối
header('location: danhsach.php');
// đường dẫn tuyệt đối
//header('location: danhsach.php');
?>
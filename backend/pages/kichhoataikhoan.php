<?php
require_once __DIR__ . '/../../dbconnect.php';
$kh_tendangnhap = $_GET['kh_tendangnhap'];
$kh_makichhoat = $_GET['kh_makichhoat'];
$sqlSelect = "SELECT * FROM khachhang WHERE kh_tendangnhap = '$kh_tendangnhap' AND kh_makichhoat = '$kh_makichhoat';";
$resultSelect = mysqli_query($conn, $sqlSelect);
$khachhangRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
if(empty($khachhangRow)) {
    echo 'Vui lòng kiểm tra lại EMAIL!';
} else {
    // Tìm được dòng khách hàng cần cập nhật
    $sqlUpdate = "UPDATE khachhang SET kh_trangthai = 1 WHERE kh_tendangnhap = '$kh_tendangnhap'";
    $resultUpdate = mysqli_query($conn, $sqlUpdate);
    echo 'Tài khoản đã được kích hoạt. Click vào <a href="http://localhost:1000/cuicoffee/hinhsanpham/danhsach.php">ĐÂY</a> để đến trang chủ!';
}
?>
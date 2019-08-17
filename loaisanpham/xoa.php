<?php
    require_once __DIR__ . '/../dbconnect.php';
    $lsp_ma = $_GET['lsp_ma'];
    $sqlDelete = "DELETE FROM loaisanpham WHERE lsp_ma = $lsp_ma;";
    $resultSelect = mysqli_query($conn, $sqlDelete);
    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:danhsach.php');
?>
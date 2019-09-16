<?php
    require_once __DIR__ . '/../../dbconnect.php';
    $lsp_ma = $_GET['id'];
    $sqlDelete = "DELETE FROM loaisanpham WHERE lsp_ma = '$lsp_ma';";
    $result = mysqli_query($conn,$sqlDelete);
    header("location:capnhatdanhsach.php");
?>
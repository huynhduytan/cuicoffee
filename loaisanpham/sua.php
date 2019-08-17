<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa</title>
</head>
<body>
    <h1>Đây là chức năng Sửa Loại sản phẩm</h1>
    <?php
        require_once __DIR__ . '/../dbconnect.php';
        $lsp_ma = $_GET['lsp_ma'];
        echo 'Đang sửa khóa chính là: ' . $lsp_ma . '<br/>';
        $sqlSelect = "SELECT * FROM loaisanpham WHERE lsp_ma=$lsp_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);
        $loaisanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
        // print_r($loaisanphamRow);
    ?>

    <form name="frmLoaiSanPhamSua" id="frmLoaiSanPhamSua" method="post" action="">
        Mã loại sản phẩm: <input type="text" name="lsp_ma" id="lsp_ma"  value="<?php echo $loaisanphamRow['lsp_ma'] ?>" /><br />
        Tên sản phẩm: <input type="text" name="lsp_ten" id="lsp_ten" value="<?= $loaisanphamRow['lsp_ten'] ?>" /><br />

        <input type="submit" name="btnSua" id="btnSua" value="Lưu" />
    </form>

    <?php
    // Tức là người dùng đã nhập xong, và bấm nút Lưu
    if(isset($_POST['btnSua'])) {
        $lsp_ten = $_POST['lsp_ten'];
       
        $sqlUpdate = "UPDATE loaisanpham SET lsp_ten = N'$lsp_ten' WHERE lsp_ma = $lsp_ma;";
        mysqli_query($conn, $sqlUpdate);
        echo 'Lưu thành công!';
        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:danhsach.php');
    }
    ?>
</body>
</html>

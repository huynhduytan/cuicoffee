<?php
require_once __DIR__ . '/../dbconnect.php';
// Lấy dữ liệu cần hiệu chỉnh
$sp_ma = $_GET['sp_ma'];
$sqlSelectSanPham = "select * from sanpham where sp_ma = $sp_ma;";
$resultSanPham = mysqli_query($conn, $sqlSelectSanPham);
$sanphamRow = [];
while ($row = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC)) {
    $sanphamRow = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        
        'lsp_ma' => $row['lsp_ma'],
        'th_ma' => $row['th_ma'],
        
    );
}
// Lấy dữ liệu Loại sản phẩm
$sqlLoaiSanPham = <<<EOT
    SELECT * FROM loaisanpham;
EOT;
$resultLoaiSanPham = mysqli_query($conn, $sqlLoaiSanPham);
$dataLoaiSanPham = [];
while ($row = mysqli_fetch_array($resultLoaiSanPham, MYSQLI_ASSOC)) {
    $dataLoaiSanPham[] = array(
        'lsp_ma' => $row['lsp_ma'],
        'lsp_ten' => $row['lsp_ten'],
    );
}
// Lấy dữ liệu thương hiệu
$sqlThuonghieu = <<<EOT
    SELECT * FROM thuonghieu;
EOT;
$resultThuonghieu = mysqli_query($conn, $sqlThuonghieu);
$dataThuonghieu = [];
while ($row = mysqli_fetch_array($resultThuonghieu, MYSQLI_ASSOC)) {
    $dataThuonghieu[] = array(
        'th_ma' => $row['th_ma'],
        'th_ten' => $row['th_ten'],
    );
}

?>

<form name="frmThemMoiSanPham" id="frmThemMoiSanPham" method="post" action="">
    Tên sản phẩm: <input type="text" name="sp_ten" id="sp_ten" value="<?= $sanphamRow['sp_ten'] ?>" /><br />
    Giá sản phẩm: <input type="text" name="sp_gia" id="sp_gia" value="<?= $sanphamRow['sp_gia'] ?>" /><br />
    
    Loại sản phẩm: 
    <select name="lsp_ma" id="lsp_ma">
        <?php foreach($dataLoaiSanPham as $loaiSanPham) : ?>
            <?php if($loaiSanPham['lsp_ma'] == $sanphamRow['lsp_ma']) { ?>
                <option value="<?= $loaiSanPham['lsp_ma'] ?>" selected><?= $loaiSanPham['lsp_ten'] ?></option>
            <?php } else { ?>
                <option value="<?= $loaiSanPham['lsp_ma'] ?>"><?= $loaiSanPham['lsp_ten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>
    <br />
    Thương hiệu: 
    <select name="th_ma" id="th_ma">
        <?php foreach($dataThuonghieu as $thuonghieu) : ?>
            <?php if($thuonghieu['th_ma'] == $sanphamRow['th_ma']) { ?>
                <option value="<?= $thuonghieu['th_ma'] ?>" selected><?= $thuonghieu['th_ten'] ?></option>
            <?php } else { ?>
                <option value="<?= $thuonghieu['th_ma'] ?>"><?= $thuonghieu['nsx_ten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>
    <br />
    
    <input type="submit" name="btnLuu" id="btnLuu" value="Lưu dữ liệu" />
</form>

<?php
if(isset($_POST['btnLuu'])) {
    $sp_ten = $_POST['sp_ten'];
    $sp_gia = $_POST['sp_gia'];
    
    $lsp_ma = $_POST['lsp_ma'];
    $th_ma = $_POST['th_ma'];
    
    $sqlUpdate = <<<EOT
    UPDATE sanpham
	SET
		sp_ten=N'$sp_ten',
		sp_gia=$sp_gia,
		
		lsp_ma=$lsp_ma,
		th_ma=$th_ma,
		
	WHERE sp_ma=$sp_ma;
EOT;
    // print_r($sqlUpdate);die;
    $resultUpdate = mysqli_query($conn, $sqlUpdate);
}
?>
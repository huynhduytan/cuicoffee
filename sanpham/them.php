<?php
require_once __DIR__ . '/../dbconnect.php';
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
// Lấy dữ liệu Thương hiệu
$sqlNhaSanXuat = <<<EOT
    SELECT * FROM thuonghieu;
EOT;
$resultThuongHieu = mysqli_query($conn, $sqlThuongHieu);
$dataThuongHieu = [];
while ($row = mysqli_fetch_array($resultThuongHieu, MYSQLI_ASSOC )) {
    $dataThuongHieu[] = array(
        'th_ma' => $row['th_ma'],
        'th_ten' => $row['th_ten'],
    );
}

?>

<form name="frmThemMoiSanPham" id="frmThemMoiSanPham" method="post" action="">
    Tên sản phẩm: <input type="text" name="sp_ten" id="sp_ten" class="form-control" /><br />
    Giá sản phẩm: <input type="text" name="sp_gia" id="sp_gia" class="form-control" /><br />
    
    
    Loại sản phẩm: 
    <select name="lsp_ma" id="lsp_ma">
        <?php foreach($dataLoaiSanPham as $loaiSanPham) : ?>
        <option value="<?= $loaiSanPham['lsp_ma'] ?>"><?= $loaiSanPham['lsp_ten'] ?></option>
        <?php endforeach; ?>
    </select>
    <br />
    Nhà sản xuất: 
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
    
    <button name="btnLuu" id="btnLuu" class="btn btn-primary">
        <i class="fa fa-heartbeat" aria-hidden="true"></i> Lưu
    </button>
</form>

<?php
if(isset($_POST['btnLuu'])) {
    $sp_ten = $_POST['sp_ten'];
    $sp_gia = $_POST['sp_gia'];
    
    $lsp_ma = $_POST['lsp_ma'];
    $th_ma = $_POST['th_ma'];
    
    $sqlInsert = "INSERT INTO sanpham(sp_ten, sp_gia,  lsp_ma, th_ma ) VALUES (N'$sp_ten', $sp_gia,   $lsp_ma, $th_ma);";
    $resultInsert = mysqli_query($conn, $sqlInsert);
}
?>
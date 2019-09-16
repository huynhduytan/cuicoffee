<?php
require_once __DIR__ . '/../../dbconnect.php';
// Lấy dữ liệu cần hiệu chỉnh
$sp_ma = $_GET['sp_ma'];
$sqlSelectSanPham = "select * from sanpham where sp_ma = $sp_ma;";
$resultSanPham = mysqli_query($conn, $sqlSelectSanPham);
$sanphamRow = [];
while ($row = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC)) {
    $sanphamRow = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_mota' => $row['sp_mota'],
        // 'sp_mota_chitiet' => $row['sp_mota_chitiet'],
        // 'sp_ngaycapnhat' => $row['sp_ngaycapnhat'],
        'sp_soluong' => $row['sp_soluong'],
        'lsp_ma' => $row['lsp_ma'],
        'th_ma' => $row['th_ma'],
        'sp_mau' => $row['sp_mau'],
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
// Lấy dữ liệu Nhà sản xuất
$sqlThuongHieu = <<<EOT
    SELECT * FROM thuonghieu;
EOT;
$resultThuongHieu = mysqli_query($conn, $sqlThuongHieu);
$dataThuongHieu = [];
while ($row = mysqli_fetch_array($resultThuongHieu, MYSQLI_ASSOC)) {
    $dataThuongHieu[] = array(
        'th_ma' => $row['th_ma'],
        'th_ten' => $row['th_ten'],
    );
}
// Lấy dữ liệu Khuyến mãi
// $sqlKhuyenMai = <<<EOT
//     SELECT * FROM khuyenmai;
// EOT;
// $resultKhuyenMai = mysqli_query($conn, $sqlKhuyenMai);
// $dataKhuyenMai = [];
// while ($row = mysqli_fetch_array($resultKhuyenMai, MYSQLI_ASSOC)) {
//     $dataKhuyenMai[] = array(
//         'km_ma' => $row['km_ma'],
//         'km_ten' => $row['km_ten'],
//     );
// }
?>

<form name="frmThemMoiSanPham" id="frmThemMoiSanPham" method="post" action="">
    Tên sản phẩm: <input type="text" name="sp_ten" id="sp_ten" value="<?= $sanphamRow['sp_ten'] ?>" /><br />
    Giá sản phẩm: <input type="text" name="sp_gia" id="sp_gia" value="<?= $sanphamRow['sp_gia'] ?>" /><br />
    Giá cũ sản phẩm: <input type="text" name="sp_giacu" id="sp_giacu" value="<?= $sanphamRow['sp_giacu'] ?>" /><br />
    Mô tả sản phẩm: <input type="text" name="sp_mota" id="sp_mota" value="<?= $sanphamRow['sp_mota'] ?>" /><br />
    <!-- Mô tả chi tiết sản phẩm: <input type="text" name="sp_mota_chitiet" id="sp_mota_chitiet" value="<?= $sanphamRow['sp_mota_chitiet'] ?>" /><br /> -->
    <!-- Ngày cập nhật sản phẩm: <input type="text" name="sp_ngaycapnhat" id="sp_ngaycapnhat" value="<?= $sanphamRow['sp_ngaycapnhat'] ?>" /><br /> -->
    Số lượng sản phẩm: <input type="text" name="sp_soluong" id="sp_soluong" value="<?= $sanphamRow['sp_soluong'] ?>" /><br />
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
        <?php foreach($dataThuongHieu as $thuonghieu) : ?>
            <?php if($thuonghieu['th_ma'] == $sanphamRow['th_ma']) { ?>
                <option value="<?= $thuonghieu['th_ma'] ?>" selected><?= $thuonghieu['th_ten'] ?></option>
            <?php } else { ?>
                <option value="<?= $thuonghieu['th_ma'] ?>"><?= $thuonghieu['th_ten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>
    <br />
    <!-- Khuyến mãi: 
    <select name="km_ma" id="km_ma">
        <?php foreach($dataKhuyenMai as $khuyenmai) : ?>
            <?php if($khuyenmai['km_ma'] == $sanphamRow['km_ma']) { ?>
                <option value="<?= $khuyenmai['km_ma'] ?>" selected><?= $khuyenmai['km_ten'] ?></option>
            <?php } else { ?>
                <option value="<?= $khuyenmai['km_ma'] ?>"><?= $khuyenmai['km_ten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select> -->
    <br />
    <input type="submit" name="btnLuu" id="btnLuu" value="Lưu dữ liệu" />
</form>

<?php
if(isset($_POST['btnLuu'])) {
    $sp_ten = $_POST['sp_ten'];
    $sp_gia = $_POST['sp_gia'];
    $sp_giacu = $_POST['sp_giacu'];
    $sp_mota = $_POST['sp_mota'];
    // $sp_mota_chitiet = $_POST['sp_mota_chitiet'];
    // $sp_ngaycapnhat = $_POST['sp_ngaycapnhat'];
    $sp_soluong = $_POST['sp_soluong'];
    $lsp_ma = $_POST['lsp_ma'];
    $th_ma = $_POST['th_ma'];
    // $km_ma = isset($_POST['km_ma']) ? $_POST['km_ma'] : 'NULL';
    $sqlUpdate = <<<EOT
    UPDATE sanpham
	SET
		sp_ten=N'$sp_ten',
		sp_gia=$sp_gia,
		sp_giacu=$sp_giacu,
		sp_mota=N'$sp_mota',	
		sp_soluong=$sp_soluong,
		lsp_ma=$lsp_ma,
		th_ma=$th_ma,
	WHERE sp_ma=$sp_ma;
EOT;
    // print_r($sqlUpdate);die;
    $resultUpdate = mysqli_query($conn, $sqlUpdate);
}
?> 
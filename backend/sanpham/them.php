<?php
require_once __DIR__ . '/../../dbconnect.php';
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
    Tên sản phẩm: <input type="text" name="sp_ten" id="sp_ten" /><br />
    Giá sản phẩm: <input type="text" name="sp_gia" id="sp_gia" /><br />
    Giá cũ sản phẩm: <input type="text" name="sp_giacu" id="sp_giacu" /><br />
    Mô tả sản phẩm: <input type="text" name="sp_mota" id="sp_mota" /><br />
    
    Số lượng sản phẩm: <input type="text" name="sp_soluong" id="sp_soluong" /><br />
    Loại sản phẩm: 
    <select name="lsp_ma" id="lsp_ma">
        <?php foreach($dataLoaiSanPham as $loaiSanPham) : ?>
        <option value="<?= $loaiSanPham['lsp_ma'] ?>"><?= $loaiSanPham['lsp_ten'] ?></option>
        <?php endforeach; ?>
    </select>
    <br />
    Thương hiệu: 
    <select name="th_ma" id="th_ma">
        <?php foreach($dataThuongHieu as $thuonghieu) : ?>
        <option value="<?= $thuonghieu['th_ma'] ?>"><?= $thuonghieu['th_ten'] ?></option>
        <?php endforeach; ?>
    </select>
    <br />
    <!-- Khuyến mãi: 
    <select name="km_ma" id="km_ma">
        <?php foreach($dataKhuyenMai as $khuyenmai) : ?>
        <option value="<?= $khuyenmai['km_ma'] ?>"><?= $khuyenmai['km_ten'] ?></option>
        <?php endforeach; ?>
    </select>
    <br />
    <input type="submit" name="btnLuu" id="btnLuu" value="Lưu dữ liệu" /> -->
</form>

<?php
if(isset($_POST['btnLuu'])) {
    $sp_ten = $_POST['sp_ten'];
    $sp_gia = $_POST['sp_gia'];
    $sp_giacu = $_POST['sp_giacu'];
    $sp_mota = $_POST['sp_mota'];  
    $sp_soluong = $_POST['sp_soluong'];
    $lsp_ma = $_POST['lsp_ma'];
    $th_ma = $_POST['th_ma'];   
    $sqlInsert = "INSERT INTO sanpham(sp_ten, sp_gia, sp_giacu, sp_mota, sp_soluong, lsp_ma, th_ma, ) VALUES (N'$sp_ten', $sp_gia, $sp_giacu, N'$sp_mota',   $sp_soluong, $lsp_ma, $th_ma);";
    $resultInsert = mysqli_query($conn, $sqlInsert);
}
?>
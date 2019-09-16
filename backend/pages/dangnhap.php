<?php
require_once __DIR__ . '/../../dbconnect.php';
?>
<form name="frmdangnhap" id="frmdangnhap" method="post" action="">

Tên dăng nhập:
<input type="text" name="kh_tendangnhap" id="kh_tendangnhap" />
<br /> Mật khẩu:
<input type="password" name="kh_matkhau" id="kh_matkhau" />
<br /> 

<button name="btnDangNhap" id="btnDangNhap" class="btn btn-primary">
    <i class="fa fa-heartbeat" aria-hidden="true"></i> Dang nhap
</button>

</form>
<?php
    if(isset($_POST['btnDangNhap'])) {
    $kh_tendangnhap = $_POST['kh_tendangnhap'];
    $kh_matkhau = sha1($_POST['kh_matkhau']);
    $sqlSelect = "select * from khachhang where kh_tendangnhap = '$kh_tendangnhap' AND kh_matkhau = '$kh_matkhau'";
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $khachhangRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); 
    if(empty($khachhangRow)) {
        echo 'Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin!';
    } else {
        echo 'Đăng nhập Thành công!';

        // lưu usertname
        $_SESSION['username'] = $kh_tendangnhap;
    }
}

    ?>
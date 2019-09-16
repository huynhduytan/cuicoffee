<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__ . '/../../bootstrap.php';
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__ . '/../../dbconnect.php');
// Nếu trong SESSION có giá trị của key 'username' <-> người dùng đã đăng nhập thành công
// Nếu chưa đăng nhập thì chuyển hướng về trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('location:../pages/login.php');
} else {
    // Chuẩn bị câu truy vấn $sql
    $sqlHinhThucThanhToan = "select * from `hinhthucthanhtoan`";
    // Thực thi câu truy vấn SQL để lấy về dữ liệu
    $resultHinhThucThanhToan = mysqli_query($conn, $sqlHinhThucThanhToan);
    // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
    $dataHinhThucThanhToan = [];
    while ($row = mysqli_fetch_array($resultHinhThucThanhToan, MYSQLI_ASSOC)) {
        $dataHinhThucThanhToan[] = array(
            'httt_ma' => $row['httt_ma'],
            'httt_ten' => $row['httt_ten'],
        );
    }
    // Lấy thông tin khách hàng
    // Lấy dữ liệu người dùng đã đăng nhập từ SESSION
    $username = $_SESSION['username'];
    // Câu lệnh SELECT
    $sql = "SELECT * FROM `khachhang` WHERE kh_tendangnhap = '$username';";
    // Thực thi SELECT
    $result = mysqli_query($conn, $sql);
    $dataKhachHang;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $dataKhachHang = array(
            'kh_tendangnhap' => $row['kh_tendangnhap'],
            'kh_ten' => $row['kh_ten'],
            'kh_gioitinh' => $row['kh_gioitinh'],
            'kh_diachi' => $row['kh_diachi'],
            'kh_dienthoai' => $row['kh_dienthoai'],
            'kh_email' => $row['kh_email'],
            'kh_ngaysinh' => $row['kh_ngaysinh'],
            'kh_thangsinh' => $row['kh_thangsinh'],
            'kh_namsinh' => $row['kh_namsinh'],
            'kh_cmnd' => $row['kh_cmnd'],
        );
    }
    // Kiểm tra dữ liệu trong session
    $data = [];
    if (isset($_SESSION['giohangdata'])) {
        $data = $_SESSION['giohangdata'];
    } else {
        $data = [];
    }
    // Yêu cầu `Twig` vẽ giao diện được viết trong file `frontend/thanhtoan/thanhtoan.html.twig`
    // với dữ liệu truyền vào file giao diện được đặt tên là `giohangdata`
    // dd($data);
    echo $twig->render('frontend/thanhtoan/thanhtoan.html.twig', [
        'giohangdata' => $data,
        'danhsachhinhthucthanhtoan' => $dataHinhThucThanhToan,
        'khachhang' => $dataKhachHang
    ]);
}
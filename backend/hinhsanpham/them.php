<?php
require_once __DIR__ . '/../../dbconnect.php';
// Lấy dữ liệu  sản phẩm
$sqlSanPham = <<<EOT
    SELECT * FROM sanpham;
EOT;
$resultSanPham = mysqli_query($conn, $sqlSanPham);
$dataSanPham = [];
while ($row = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC)) {
    $dataSanPham[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
    );
}


?>

<form name="frmHinhSanPham" id="frmHinhSanPham" method="post" action="" enctype="multipart/form-data">
    Chọn hình ảnh :
     <input type="file" name="hsp_tentaptin" id="hsp_tentaptin" /><br />
   Chọn sản phẩm:
    <select name="sp_ma" id="sp_ma">
        <?php foreach($dataSanPham as $SanPham) : ?>
        <option value="<?= $SanPham['sp_ma'] ?>"><?= $SanPham['sp_ten'] ?></option>
        <?php endforeach; ?>
    </select>
    <br />
    
    
   
    <button name="btnLuu" id="btnLuu" class="btn btn-primary">
        <i class="fa fa-heartbeat" aria-hidden="true"></i> Lưu
    </button>
</form>
<?php
if(isset($_POST['btnLuu'])) {
    $sp_ma = $_POST['sp_ma'];
    // Đường dẫn để chứa thư mục upload trên ứng dụng web của chúng ta. Các bạn có thể tùy chỉnh theo ý các bạn.
    // Ví dụ: các file upload sẽ được lưu vào thư mục ./../public/uploads
    $upload_dir = "./../../public/uploads/";
    // Đối với mỗi file, sẽ có các thuộc tính như sau:
    
    // $_FILES['hsp_tentaptin']['name'] = '4707_sao-khuya.jpg';
    // $_FILES['hsp_tentaptin']['type'] = '.jpg';
    // $_FILES['hsp_tentaptin']['tmp_name'] = 'AABB1123.tmp';
    // $_FILES['hsp_tentaptin']['error'] = '0';
    // $_FILES['hsp_tentaptin']['size'] = '35Kb';
    // $_FILES['hsp_tentaptin']['name']     : Tên của file chúng ta upload
    // $_FILES['hsp_tentaptin']['type']     : Kiểu file mà chúng ta upload (hình ảnh, word, excel, pdf, txt, ...)
    // $_FILES['hsp_tentaptin']['tmp_name'] : Đường dẫn đến file tạm trên web server
    // $_FILES['hsp_tentaptin']['error']    : Trạng thái của file chúng ta upload, 0 => không có lỗi
    // $_FILES['hsp_tentaptin']['size']     : Kích thước của file chúng ta upload
    // Nếu file upload bị lỗi, tức là thuộc tính error > 0
    // if($_FILES['hsp_tentaptin']['size'] > 3500000000) {
    //     echo 'vuot qua/...';die;
    // }
    // if($_FILES['hsp_tentaptin']['type'] == '.php'
    //     || $_FILES['hsp_tentaptin']['type'] == '.exe'
    //     $_FILES['hsp_tentaptin']['type'] == '.cs'
    // ) {
    //     echo 'File k dc phep upload';die;
    // }
    if ($_FILES['hsp_tentaptin']['error'] > 0)
    {
        echo 'File Upload Bị Lỗi';die;
    }
    else{
        // Tiến hành di chuyển file từ thư mục tạm trên server vào thư mục chúng ta muốn chứa các file uploads
        // Ví dụ: move file từ C:\xampp\tmp\php6091.tmp -> C:/xampp/htdocs/learning.nentang.vn/php/twig/assets/uploads/hoahong.jpg
        $hsp_tentaptin = $_FILES['hsp_tentaptin']['name'];
        move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir.$hsp_tentaptin);
        echo 'File Uploaded';
        $sqlInsert="INSERT INTO hinhsanpham (hsp_tentaptin,sp_ma) VALUE ('$hsp_tentaptin', $sp_ma)";
        $result = mysqli_query($conn, $sqlInsert);
    }
}

?>


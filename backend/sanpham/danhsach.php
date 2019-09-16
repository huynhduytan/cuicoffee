<?php
require_once __DIR__ . '/../../dbconnect.php';

//kiểm tra session
 if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
     echo'Đã đăng nhập!';
 }else {
 echo 'Bạn chưa đăng nhập. Vui lòng <a href="http://localhost:1000/cuicoffee/pages/dangnhap.php">click vào đây</a> để đến trang Đăng nhập';
 die;
}

// Here DOCS
// End of Text
$sql = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota, sp.sp_soluong,
    lsp.lsp_ten, th.th_ten, sp.sp_mau
    FROM sanpham sp
    JOIN loaisanpham lsp ON sp.lsp_ma = lsp.lsp_ma
    LEFT join thuonghieu th ON sp.th_ma = th.th_ma;
EOT;
$result = mysqli_query($conn,$sql);
$data = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_giacu' => $row['sp_giacu'],
        'sp_mota' => $row['sp_mota'],
        'sp_soluong' => $row['sp_soluong'],
        'lsp_ten' => $row['lsp_ten'],
        'th_ten' => $row['th_ten'],
        'sp_mau' => $row['sp_mau'],
        // 'km_ten' => $row['km_ten'],
    );
}
// var_dump($data);die;
?>

<a href="/cuicoffee/index.php?page=sanpham_them" class="btn btn-outline-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Sản phẩm</a>
<div class="table-responsive-sm">
    <table class="table table-bordered table-hover table-sm">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Giá cũ sản phẩm</th>
                <th>Mô tả  sản phẩm</th>
                <th>Số lượng sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Thương hiệu</th>
                <th>Mẫu sản phẩm</th>
                <!-- <th>Khuyến mãi sản phẩm</th> -->
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
            <tr>
                <td><?= $row['sp_ma'] ?></td>
                <td><?= $row['sp_ten'] ?></td>
                <td><?= $row['sp_gia'] ?></td>
                <td><?= $row['sp_giacu'] ?></td>
                <td><?= $row['sp_mota'] ?></td>
                <td><?= $row['sp_soluong'] ?></td>
                <td><?= $row['lsp_ten'] ?></td>
                <td><?= $row['th_ten'] ?></td>
                <td><?= $row['sp_mau'] ?></td>
                <!-- <td><?= $row['km_ten'] ?></td> -->
                <td>
                    <a href="/cuicoffee/sanpham/sua.php?sp_ma=<?= $row['sp_ma']; ?>">Sửa</a>
                    <!-- <a href="/StudyWEB/sanpham/xoa.php?sp_ma=">Xóa</a> -->
                    <button class="btn btn-danger btn-delete" data-sp-ma="<?= $row['sp_ma'] ?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
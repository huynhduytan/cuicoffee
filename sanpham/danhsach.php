<?php
require_once __DIR__ . '/../dbconnect.php';
// Here DOCS
// End of Text
$sql = <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, 
    lsp.lsp_ten, th.th_ma 
    FROM sanpham sp
    JOIN loaisanpham lsp ON sp.lsp_ma = lsp.lsp_ma
    JOIN thuonghieu th ON sp.th_ma = th.th_ma

EOT;
$result = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'sp_gia' => $row['sp_gia'],
        
        'lsp_ten' => $row['lsp_ten'],
        'th_ten' => $row['th_ten'],
        
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
                
                <th>Loại sản phẩm</th>
                <th>Thương hiệu</th>
                
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
            <tr>
                <td><?= $row['sp_ma'] ?></td>
                <td><?= $row['sp_ten'] ?></td>
                
                <td><?= $row['lsp_ten'] ?></td>
                <td><?= $row['th_ten'] ?></td>
                
                <td>
                    <a href="/cuicoffee/sanpham/sua.php?sp_ma=<?= $row['sp_ma']; ?>">Sửa</a>
                    <a href="/cuicoffee/sanpham/xoa.php?sp_ma=<?= $row['sp_ma']; ?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
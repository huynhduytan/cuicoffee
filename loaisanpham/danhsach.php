<?php
require_once __DIR__ . '/../dbconnect.php';
$sql = "SELECT * FROM loaisanpham;";
$result = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
        'lsp_ma' => $row['lsp_ma'],
        'lsp_ten' => $row['lsp_ten'],
        
    );
}
/*
[
    ['lsp_ma' => 1, 'lsp_ten' => 'phụ kiện',  row1
    ['lsp_ma' => 2, 'lsp_ten' => 'cafe & mật ong',  row2
    ['lsp_ma' => 3, 'lsp_ten' => 'thiết bị',  row3
    ...
]
*/
// print_r($data);die;
// var_dump($data);die;
?>

<style>
.rowchan {
    background: red;
}
</style>

<a href="/cuicoffee/loaisanpham/them.php">Thêm Loại sản phẩm</a>
<table border="1">
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>Chức năng</th>
    </tr>
    <?php
    $bienDem = 1;
    ?>
    <?php foreach($data as $row): ?>
    <tr class="<?php echo ($bienDem % 2 == 0 ? 'rowchan' : '') ?>">
        <td><?= $row['lsp_ma']; ?></td>
        <td><?= $row['lsp_ten']; ?></td>
        
        <td>
            <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
            <a href="/cuicoffee/loaisanpham/sua.php?lsp_ma=<?= $row['lsp_ma']; ?>">Sửa</a>
            <a href="/cuicoffee/loaisanpham/xoa.php?lsp_ma=<?= $row['lsp_ma']; ?>">Xóa</a>
        </td>
    </tr>
    <?php $bienDem++; ?>
    <?php endforeach; ?>
</table>
<?php
require_once __DIR__ . '/../../dbconnect.php';
$sqlLoaisanpham = <<<EOT
            SELECT * FROM loaisanpham
EOT;
$resultLoaisanpham = mysqli_query($conn, $sqlLoaisanpham);
$dataLoaisanpham = [];
while ($row = mysqli_fetch_array($resultLoaisanpham, MYSQLI_ASSOC)) {
    $dataLoaisanpham[] = array(
        'lsp_ma' => $row['lsp_ma'],
        'lsp_ten' => $row['lsp_ten'],
    );
}
?>
<form name="frmLoaisanpham" id="frmLoaisanpham" method="POST" action="">
      Tên Loại Sản Phẩm :<input type="text" class="form-control" name="lsp_ten" id="lsp_ten" /><br>
      <input type="submit" name="btnthem" id="btnthem" value="Them" class="btn btn-primary"/>
</form>
<?php
if(isset($_POST['btnthem'])){
    $lsp_ten = $_POST['lsp_ten'];
    $sqlUpdate = "INSERT INTO loaisanpham (lsp_ten) VALUES (N'$lsp_ten');";
    mysqli_query($conn,$sqlUpdate);
    echo('Thanh  Cong');
    header("location:capnhatdanhsach.php");
}
?>
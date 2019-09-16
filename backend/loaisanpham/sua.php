<?php
    require_once __DIR__ . '/../../dbconnect.php';
    $lsp_ma = $_GET['id'];
    echo "Đây là ID cua " . $lsp_ma;
    $sqlSelect = "SELECT * from loaisanpham where lsp_ma = $lsp_ma ";
    $resultSelect = mysqli_query($conn,$sqlSelect);

    $loaisanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
    print_r($loaisanphamRow);
?>
<form name="frmsua" id="frmsua" method="POST" action="">
    Mã Sản Phẩm:<input type="text" name="lsp_ma" id="lsp_ma" readonly value="<?php echo $loaisanphamRow['lsp_ma'] ?>" class="form-control" /><br />
    Tên Sản Phẩm:<input type="text" name="lsp_ten" id="lsp_ten" value="<?= $loaisanphamRow['lsp_ten'] ?>" class="form-control"/><br />
    Tên mô tả Sản Phẩm:<input type="text" name="lsp_mota" id="lsp_mota" value="<?= $loaisanphamRow['lsp_mota'] ?>" class="form-control"/><br />
    <input type="submit" name="btnsua" id="btnsua" value="SAVE" class="btn btn-primary"/>
</form>

<?php
    if(isset($_POST['btnsua'])){
        $lsp_ten = $_POST['lsp_ten'];
        $lsp_mota = $_POST['lsp_mota'];
        $sqlUpdate = "UPDATE loaisanpham SET lsp_ten = N'$lsp_ten' , lsp_mota = N'$lsp_mota' WHERE lsp_ma ='$lsp_ma'; ";
        mysqli_query($conn,$sqlUpdate);
        echo ('Save Thành Công');
        header("location:capnhatdanhsach.php");
    }
?>
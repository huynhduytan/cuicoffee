<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <style>
        div {
            border: 1px solid black;
        }
        </style>
</head>
<body>
    <!--menu ngang-->
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Củi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="#">TỔNG QUAN</a>
            </li>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  SẢN PHẨM
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">DANH MỤC</a>
                  <a class="dropdown-item" href="#">THIẾT LẬP GIÁ</a>
                  <a class="dropdown-item" href="#">KIỂM KHO</a>
                </div>
              </div>
              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    GIAO DỊCH
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">HÓA ĐƠN</a>
                    <a class="dropdown-item" href="#">NHẬP HÀNG</a>
                    <a class="dropdown-item" href="#">TRẢ HÀNG</a>
                  </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      ĐỐI TÁC
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">KHÁCH HÀNG</a>
                      <a class="dropdown-item" href="#">NHÀ CUNG CẤP</a>
                      <a class="dropdown-item" href="#">ĐỐI TÁC GIAO HÀNG</a>
                    </div>
                  </div>
            
      </nav>  
      <div class="row">
        <div class="col-md-3">
          
            <!---contentleft-->
            <h3>TÌM KIẾM</h3>
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="theo mã, tên" aria-label="search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
            </form>
            <h4>LOẠI SẢN PHẨM</h4>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  LOại 1
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                  LOẠI 2
                </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" >
                  <label class="form-check-label" for="defaultCheck3">
                    LOẠI 3
                  </label>
                </div>
        </div>
        <div class="col-md-9">
           <!---contentright-->
           <h4>Sản Phẩm</h4>
           <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'sanpham_danhsach';
                if($page == 'loaisanpham_danhsach') {
                    include('loaisanpham/danhsach.php');
                } else if($page == 'sanpham_danhsach') {
                    include('sanpham/danhsach.php');
                } else if($page == 'sanpham_them') {
                    include('sanpham/them.php');
                }
                ?>
           

        </div>
            
         
      </div>   
     </div>
</body>
</html>
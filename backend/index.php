<?php
require_once __DIR__ . '/../dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý Salomon</title>

    <!-- Liên kết CSS bootstrap -->
    <link href="./../public/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

    <!-- Liên kết thêm FONT AWESOME -->
    <link rel="stylesheet" href="./../public/vendor/font-awesome-4.7.0/css/font-awesome.min.css">

    <style>
    
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="row">
            <div class="col-md-6 col-12 col-xl-3">
                Cột LOGO
            </div><!-- /End cột LOGO -->
            <div class="col-md-6 col-12 col-xl-9">
                Cột Tên công ty
            </div><!-- /End cột COMPANY NAME -->
        </div><!-- /End header -->

        <!-- Main content -->
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="?page=loaisanpham_danhsach">Danh sách Loại sản phẩm</a></li>
                    <li class="list-group-item"><a href="?page=sanpham_danhsach">Danh sách Sản phẩm</a></li>
                    <li class="list-group-item"><a href="?page=hinhsanpham_danhsach">Hinh Sản phẩm</a></li>
                    <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])) : ?>
                        <li class="list-group-item"><a href="/cuicoffee/pages/dangxuat.php">Đăng xuất</a></li>
                    <?php else : ?>
                        <li class="list-group-item"><a href="/cuicoffee/pages/dangnhap.php">Đăng nhập</a></li>
                    <?php endif ?>

                    
                </ul>
            </div><!-- /End sidebar -->
            <!-- Content -->
            <div class="col-md-9">
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'sanpham_danhsach';

                if($page == 'loaisanpham_danhsach') {
                    include('loaisanpham/danhsach.php');
                } else if($page == 'sanpham_danhsach') {
                    include('sanpham/danhsach.php');
                } else if($page == 'sanpham_them') {
                    include('sanpham/them.php');
                }else if($page == 'hinhsanpham_danhsach') {
                    include('hinhsanpham/danhsach.php');
                }                
                ?>
            </div><!-- /End content -->
        </div><!-- /End main content -->

        <!-- Footer -->
        <div class="row">
            <div class="col-md-3">
                Cột ABOUT US
            </div><!-- /End cột ABOUT US -->
            <div class="col-md-3">
                Cột LINK
            </div><!-- /End cột LINK -->
            <div class="col-md-3">
                Cột NEWS
            </div><!-- /End cột NEWS -->
            <div class="col-md-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.723612696626!2d105.78061631510307!3d10.039650892824028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a767d14a8f%3A0xd2b013e6e71cae96!2zQ8ahIFPhu58gVGluIEjhu41jIC0gQW5oIFbEg24gTWFpIEth!5e0!3m2!1svi!2s!4v1565871694276!5m2!1svi!2s" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div><!-- /End cột MAP -->
        </div><!-- /End Footer -->
    </div>

    <!-- Hầu như tích hợp thư viện JS trước khi đóng thẻ BODY để tăng trải nghiệm người dùng -->
    <!-- Liên kết thư viện JQuery -->
    <script src="./../public/vendor/jquery/jquery.min.js"></script>

    <!-- Liên kết thư viện POPPERJS -->
    <script src="./../public/vendor/popperjs/popper.min.js"></script>

    <!-- Liên kết thư viện Bootstrap 4 -->
    <script src="./../public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Liên kết thư viện SweetAlert2 -->
    <script src="./../public/vendor/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Custom script -->
    <?php if($page == 'loaisanpham_danhsach') : ?>
        <script src="./../public/js/loaisanpham/loaisanpham.js"></script>
    <?php elseif($page == 'sanpham_danhsach') : ?>
        <script src="./../public/js/sanpham/sanpham.js"></script>
        <script src="./../public/js/sanpham/sanpham-search.js"></script>
    <?php elseif($page == 'sanpham_them') : ?>
        <script src="./../public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="./../public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
        <!-- <script src="public/js/sanpham/sanpham-validate.js"></script> -->
    <?php endif ?>
</body>
</html>

 
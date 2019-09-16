<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/bootstrap.php';
// Thực hiện LOGIC code
// Giả sử lấy dữ liêu rồi SELECT * FROM configs/settings
$diachi = '130 XVNT CT....';
$sodt = '0915659223';
$congty = 'MAIKA';
// Yêu cầu `Twig` vẽ giao diện được viết trong file `vidu3.html.twig`
// với dữ liệu truyền vào file giao diện được đặt tên là ``
echo $twig->render('gioithieu_kieutable.html.twig', 
    // Dữ liệu được đổ vào template
    [
        'dc' => $diachi,
        'dt' => $sodt,
        'cty' => $congty,
    ]
);
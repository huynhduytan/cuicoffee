<?php
$conn = mysqli_connect('127.0.0.1', 'root', '', 'cuicoffee') or die('Server không kết nối được');
$conn->query("SET NAME 'utf8'"); // set charset utf8 dùng để gõ tiếng Việt, Thái, Nhật,Trung Quốc
$conn->query("SET CHARACTER SET utf8 "); //lưu ý: gõ bộ gõ unikey, max  unnicode
// session start
 session_start();
?>


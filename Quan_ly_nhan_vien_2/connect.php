<?php
$conn = mysqli_connect('localhost', 'root', '', 'quan_ly_nhan_vien');

if (!$conn) {
    die("Lỗi kết nối" . mysqli_connect_error());
}

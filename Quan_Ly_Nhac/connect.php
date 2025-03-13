<?php
$conn = mysqli_connect('localhost', 'root', '', 'quan_ly_nhac');

if (!$conn) {
    die("Lỗi kết nối" . mysqli_connect_error());
}

?>
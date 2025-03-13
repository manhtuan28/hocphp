<?php
$conn = mysqli_connect('localhost', 'root', '', 'quan_ly_phim');

if(!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}

?>
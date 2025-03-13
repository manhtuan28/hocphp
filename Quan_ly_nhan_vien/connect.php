<?php
$conn = mysqli_connect('localhost', 'root', '', 'quan_ly_nhan_vien');

if(!$conn) {
    die("Loi ket noi" . mysqli_connect_error());

}

?>
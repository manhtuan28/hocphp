<?php
error_reporting(0);

function nhap_mang($str) {
    $arr = [];
    $str = implode(",", $arr);

    return $str;
}
function xuat_mang() {}
function tim_kiem() {}

if(isset($_POST['nhapMang']) && isset($_POST['soCanTim'])) {

}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tìm kiếm</title>
</head>

<body>
    <form action="" method="post">
        <div class="title">
            Tìm kiếm
        </div>
        <div class="box-inp">
            <span>Nhập mảng:</span>
            <input type="text" name="nhapMang" id="">
            <span>Nhập số cần tìm:</span>
            <input type="text" name="soCanTim" id="">
            <button type="submit">Tìm kiếm</button>
        </div>
        <div class="box-inp">
            <span>Mảng:</span>
            <input type="text" name="mangKetQua" id="">
            <span>Kết quả tìm kiếm:</span>
            <input type="text" name="ketQuaTimKiem" id="">
        </div>
    </form>
</body>

</html>
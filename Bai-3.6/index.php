<?php
error_reporting(0);

function nhap_mang($str)
{
    return array_map('trim', explode(',', $str));
}
function xuat_mang($arr)
{
    return implode(',', $arr);
}
function tim_kiem($arr, $giaTri)
{
    $viTri = [];

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $giaTri) {
            $viTri[] = $i + 1;
        }
    }

    return empty($viTri) ? "Không tìm thấy $giaTri trong mảng" : "Tìm thấy $giaTri tại vị trí thứ " . implode(",", $viTri) . " của mảng";
}

if (isset($_POST['nhapMang']) && isset($_POST['soCanTim'])) {
    $nhapMang = nhap_mang($_POST['nhapMang']);
    $soCanTim = $_POST['soCanTim'];

    $ketQuaTimKiem = tim_kiem($nhapMang, $soCanTim);
    $nhapMang = xuat_mang($nhapMang);
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
            <input type="text" name="nhapMang" id="" required value="<?php echo $nhapMang; ?>">
            <span>Nhập số cần tìm:</span>
            <input type="text" name="soCanTim" id="" required value="<?php echo $soCanTim; ?>">
            <button type="submit">Tìm kiếm</button>
        </div>
        <div class="box-inp">
            <span>Mảng:</span>
            <input type="text" name="mangKetQua" id="" readonly value="<?php echo $nhapMang; ?>">
            <span>Kết quả tìm kiếm:</span>
            <input type="text" name="ketQuaTimKiem" id="" readonly value="<?php echo $ketQuaTimKiem; ?>">
        </div>
    </form>
</body>

</html>
<?php
error_reporting(0);

// Nhập mảng
function nhap_mang($str)
{
    return array_map('trim', explode(",", $str));
}

// Gộp mảng
function gop_mang($str1, $str2)
{
    return implode(",", array_merge(nhap_mang($str1), nhap_mang($str2)));
}

// Tổng chẵn
function tong_chan($str)
{
    $arr = nhap_mang($str);
    $s = 0;

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] % 2 == 0) {
            $s += $arr[$i];
        }
    }

    return $s;
}

// Tổng lẻ
function tong_le($str) {
    $arr = nhap_mang($str);
    $s = 0;

    for ($i = 0; $i < count($arr); $i++) {
        if($arr[$i] % 2 != 0) {
            $s += $arr[$i];
        }
    }
    
    return $s;
}

if (isset($_POST['nhapMang1']) && isset($_POST['nhapMang2'])) {
    $nhapMang1 = $_POST['nhapMang1'];
    $nhapMang2 = $_POST['nhapMang2'];

    $mangGop = gop_mang($nhapMang1, $nhapMang2);
    $tongChan = tong_chan($mangGop);
    $tongLe = tong_le($mangGop);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="nhapMang1" id="" required placeholder="Nhập mảng 1" value="<?php echo $nhapMang1; ?>">
        <input type="text" name="nhapMang2" id="" required placeholder="Nhập mảng 2" value="<?php echo $nhapMang2; ?>">
        <button type="submit">Tính toán</button>
        <input type="text" name="gopMang" id="" readonly placeholder="Sau khi gộp" value="<?php echo $mangGop; ?>">
        <input type="text" name="tongChan" id="" readonly placeholder="Tổng các số chẵn" value="<?php echo $tongChan; ?>">
        <input type="text" name="tongLe" id="" readonly placeholder="Tổng các số lẻ" value="<?php echo $tongLe; ?>">
    </form>
</body>

</html>
<?php
error_reporting(0);

// Nhập mảng
function nhapMang($str)

{
    $arr = explode(",", $str);
    return array_map('intval', $arr);
}


// Gộp mảng
function gopMang($arr1, $arr2)
{
    return array_merge($arr1, $arr2);
}


// Tìm Giá Trị Lớn Nhất
function timGTLB($arr)
{
    $max = $arr[0];

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }
    return $max;
}


// Tính tích các phần tử lẻ
function tinhTichCacPTLe($arr)
{
    $tich = 1;
    $soLe = false;

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] % 2 != 0) {
            $tich *= $arr[$i];
            $soLe = true;
        }
    }

    return $soLe ? $tich : 0;
}


// Sắp xếp tăng dần
function sapXepTangDan($arr)
{
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {

                $tg = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tg;
            }
        }
    }
    return $arr;
}


// Kiểm tra số nguyên tố
function soNguyenTo($n)
{
    if ($n < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }

    return true;
}


// Tìm số nguyên tố trong mảng
function timSoNguyenTo($arr)
{
    $nguyenTo = [];

    for ($i = 0; $i < count($arr); $i++) {
        if (soNguyenTo($arr[$i])) {
            $nguyenTo[] = $arr[$i];
        }
    }

    return implode(",", $nguyenTo);
}


if (isset($_POST['nhapMang1']) && isset($_POST['nhapMang2'])) {
    $mang1 = nhapMang($_POST['nhapMang1']);
    $mang2 = nhapMang($_POST['nhapMang2']);

    $mang1str = implode(",", $mang1);
    $mang2str = implode(",", $mang2);

    $mangGop = gopMang($mang1, $mang2);
    $mangGopstr = implode(",", $mangGop);

    $giaTriLonNhat = timGTLB($mangGop);
    $tichCacSoLe = tinhTichCacPTLe($mangGop);

    $sapXepTang = sapXepTangDan($mangGop);
    $sapXepTangstr = implode(",", $sapXepTang);

    $soNguyenTostr = timSoNguyenTo($mangGop);
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mảng - Bài 1</title>
</head>

<body>
    <form action="" method="POST">
        <div class="title">
            Bài Tập
        </div>
        <div class="form-input">
            <div class="box-input">
                <span>Nhập mảng 1:</span>
                <input type="text" name="nhapMang1" id="" required value="<?php echo $mang1str; ?>">
            </div>
            <div class="box-input">
                <span>Nhập mảng 2:</span>
                <input type="text" name="nhapMang2" id="" required value="<?php echo $mang2str; ?>">
            </div>
            <div class="box-input">
                <span>Gộp 2 mảng:</span>
                <input type="text" name="gopHaiMang" id="" readonly value="<?php echo $mangGopstr; ?>">
            </div>
            <div class="box-input">
                <span>GTLN (MAX) trong mảng:</span>
                <input type="text" name="timGTLN" id="" readonly value="<?php echo $giaTriLonNhat; ?>">
            </div>
            <div class="box-input"><span>Tích các phần tử lẻ:</span>
                <input type="text" name="tichPhanTuLe" id="" readonly value="<?php echo $tichCacSoLe; ?>">
            </div>
            <div class="box-input"><span>Sắp xếp mảng tăng dần</span>
                <input type="text" name="sapXepTangDan" id="" readonly value="<?php echo $sapXepTangstr; ?>">
            </div>
            <div class="box-input"><span>Số nguyên tố trong mảng</span>
                <input type="text" name="soNguyenTo" id="" readonly value="<?php echo $soNguyenTostr; ?>">
            </div>
            <div class="box-button">
                <button type="submit">Tính Toán</button>
            </div>
            <div class="info-warring">
                <span style="font-style: italic;">(Ghi chú: Các phần tử trong mảng cách nhau bới dấu ",")</span>
            </div>
        </div>
    </form>
</body>

</html>
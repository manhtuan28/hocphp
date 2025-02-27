<?php
error_reporting(0);

function tao_mang($n)
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = rand(0, 100);
    }

    return $arr;
}

function xuat_mang($arr)
{
    return implode(",", $arr);
}

function tong_phan_tu($arr)
{
    $sum = 0;

    for ($i = 0; $i < count($arr); $i++) {
        $sum += $arr[$i];
    }

    return $sum;
}

function tim_kiem_phan_tu($arr, $giaTri)
{
    $viTri = [];

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $giaTri) {
            $viTri[] = $i + 1;
        }
    }

    return empty($viTri) ? "Không tìm thấy $giaTri trong mảng" : "Giá trị $giaTri nằm tại vị trí: " . implode(",", $viTri);
}

function sap_xep_tang_dan($arr)
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

function so_chinh_phuong($arr)
{
    $cp = [];

    for ($i = 0; $i < count($arr); $i++) {
        $so = $arr[$i];

        if ($so >= 0 && sqrt($so) == (int)sqrt($so)) {
            $cp[] = $so;
        }
    }

    return $cp;
}

if (isset($_POST['soPhanTu']) && isset($_POST['giaTriTimKiem'])) {
    $n = $_POST['soPhanTu'];
    $timKiem = $_POST['giaTriTimKiem'];

    $arr = tao_mang($n);
    $arr_result = xuat_mang(array_unique($arr));

    $tongPhanTu = tong_phan_tu($arr);

    $sapXepTang = sap_xep_tang_dan($arr);
    $sapXepTangstr = implode(",", $sapXepTang);

    $ketQuaTimKiem = tim_kiem_phan_tu($arr, $timKiem);

    $soChinhPhuong = so_chinh_phuong($arr);
    $soChinhPhuongstr = implode(",", $soChinhPhuong);
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tuancute Test</title>
</head>

<body>
    <form action="" method="POST">
        <div class="title">
            Phát sinh mảng và tính toán
        </div>
        <div class="form-input">
            <div class="box-input">
                <span>Nhập số phần tử:</span>
                <input type="text" name="soPhanTu" id="" required value="<?php echo $n; ?>">
            </div>
            <div class="box-input">
                <span>Nhập giá trị cần tìm kiếm:</span>
                <input type="text" name="giaTriTimKiem" id="" value="<?php echo $timKiem; ?>">
            </div>
            <div class="box-button box-input">
                <button type="submit">Phát sinh và tính toán</button>
            </div>
            <div class="box-input-group-2">
                <div class="box-input">
                    <span>Mảng:</span>
                    <input type="text" name="mangKetQua" id="" readonly value="<?php echo $arr_result; ?>">
                </div>
                <div class="box-input">
                    <span>Tổng các phần tử:</span>
                    <input type="text" name="tongCacPhanTu" id="" readonly value="<?php echo $tongPhanTu; ?>">
                </div>
                <div class="box-input">
                    <span>Kết quả tìm kiếm:</span>
                    <input type="text" name="ketQuaTimKiem" id="" readonly value="<?php echo $ketQuaTimKiem; ?>">
                </div>
                <div class="box-input">
                    <span>Sắp xếp mảng tăng dần:</span>
                    <input type="text" name="sapXepMangTangDan" id="" readonly value="<?php echo $sapXepTangstr; ?>">
                </div>
                <div class="box-input">
                    <span>Số chính phương:</span>
                    <input type="text" name="soChinhPhuong" id="" readonly value="<?php echo $soChinhPhuongstr; ?>">
                </div>
            </div>
        </div>
    </form>
</body>

</html>
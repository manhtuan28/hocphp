<?php
error_reporting(0);

function tao_mang($n)
{
    for ($i = 0; $i < $n; $i++) {
        $mang[$i] = rand(0, 20);
    }
    return $mang;
}

function xuat_mang($mang)
{
    $chuoi = "";
    for ($i = 0; $i < count($mang); $i++) {
        $chuoi = $chuoi . $mang[$i] . " ";
    }
    return $chuoi;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['soPhanTu'])) {
        $n = $_POST['soPhanTu'];

        $mang = tao_mang($n);
        $mangkq = xuat_mang(array_unique($mang));
        // array_unique: loại bỏ giá trị trùng lặp trong mảng;

        $max_array = max($mang);
        $min_array = min($mang);
        $sum_array = array_sum($mang);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Phát sinh mảng và tính toán</title>
</head>

<body>
    <form action="" method="POST">
        <div class="title">Phát sinh mảng và tính toán</div>
        <div class="container-input-head">
            <div class="form-input">
                <div class="box-input">
                    <span>Nhập số phần tử:</span>
                    <input type="text" name="soPhanTu" id="" required value="<?php echo $n; ?>">
                </div>
                <div class="box-button">
                    <button type="submit" name="submit">Phát sinh và tính toán</button>
                </div>
            </div>
        </div>
        <div class="container-input-result">
            <div class="form-input">
                <div class="box-input">
                    <span>Mảng:</span>
                    <input type="text" name="array-number" id="" readonly value="<?php echo $mangkq; ?>">
                </div>
                <div class="box-input">
                    <span>GTLN (MAX) trong mảng:</span>
                    <input type="text" name="max-array" id="" readonly value="<?php echo $max_array; ?>">
                </div>
                <div class="box-input">
                    <span>TTNN (MIN) trong mảng:</span>
                    <input type="text" name="min-array" id="" readonly value="<?php echo $min_array; ?>">
                </div>
                <div class="box-input">
                    <span>Tổng mảng:</span>
                    <input type="text" name="sum-array" id="" readonly value="<?php echo $sum_array; ?>">
                </div>
                <div class="note">
                    <p>
                        (
                        <span style="color: red;">Ghi chú: </span>
                        Các phần tử trong mảng sẽ có giá trị từ 0 đến 20
                        )
                    </p>
                </div>
            </div>
        </div>
    </form>
</body>

</html>

<!-- Code By Tuancute -->
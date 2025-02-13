<?php
$toan = "";
$ly = "";
$hoa = "";
$diemchuan = 20;
$tongdiem = "";
$ketquathi = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $toan = $_POST['toan'];
    $ly = $_POST['ly'];
    $hoa = $_POST['hoa'];
    $diemchuan = $_POST['diemchuan'];

    if ($toan != "" && $ly != "" && $hoa != "") {
        $toan = floatval($toan);
        $ly = floatval($ly);
        $hoa = floatval($hoa);
        $diemchuan = floatval($diemchuan);

        if (($toan < 0 || $toan > 10) || ($ly < 0 || $ly > 10) || ($hoa < 0 || $hoa > 10)) {
            $error = "Nhập theo thang điểm 10 đi ơ???";
        } else {
            $tongdiem = $toan + $ly + $hoa;

            if ($toan == 0 || $ly == 0 || $hoa == 0 || $tongdiem < $diemchuan) {
                $ketquathi = "Rớt";
            } else {
                $ketquathi = "Đậu";
            }
        }
    } else {
        $error = 'Nhập đầy đủ điểm vào đi ơ???';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thi đại học</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">
        <div class="title">
            Kết quả thi đại học
        </div>
        <div class="form-group-input">
            <div class="form-input">
                <label for="">Toán:</label>
                <input type="number" step="any" name="toan" id="" value="<?php echo $toan; ?>">
            </div>
            <div class="form-input">
                <label for="">Lý:</label>
                <input type="number" step="any" name="ly" id="" value="<?php echo $ly; ?>">
            </div>
            <div class="form-input">
                <label for="">Hóa:</label>
                <input type="number" step="any" name="hoa" id="" value="<?php echo $hoa; ?>">
            </div>
            <div class="form-input">
                <label for="">Điểm chuẩn:</label>
                <input type="number" step="any" name="diemchuan" id="" value="<?php echo $diemchuan; ?>">
            </div>
            <div class="form-input">
                <label for="">Tổng điểm:</label>
                <input type="text" step="any" name="tongdiem" id="" readonly value="<?php echo $tongdiem;
                                                                                    echo $error; ?>">
            </div>
            <div class="form-input">
                <label for="">Kết quả thi</label>
<!-- Code By Tuancute -->
                <input type="text" name="ketquathi" id="" readonly value="<?php echo $ketquathi;
                                                                            echo $error; ?>">
            </div>
        </div>
        <div class="form-group-btn">
            <button type="submit">Xem kết quả</button>
        </div>
    </form>

</body>

</html>

<!-- Code By Tuancute -->
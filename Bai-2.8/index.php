<?php
$diemhk1 = "";
$diemhk2 = "";
$diemtrungbinh = "";
$ketqua = "";
$xeploaihocluc = "";
$diemtrungbinh_hien_thi = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $diemhk1 = $_POST['diemhk1'];
    $diemhk2 = $_POST['diemhk2'];

    if (!empty($diemhk1) && !empty($diemhk2)) {
        $diemtrungbinh = ($diemhk1 + $diemhk2 * 2) / 3;
        $diemtrungbinh_hien_thi = number_format($diemtrungbinh,2);

        if ($diemhk1 > 10 || $diemhk2 > 10) {
            $diemtrungbinh = "Nhập điểm theo thang điểm 10 đi ơ???.";
            $ketqua = "Nhập điểm theo thang điểm 10 đi ơ???.";
            $xeploaihocluc = "Nhập điểm theo thang điểm 10 đi ơ???.";
        } else {
            if ($diemtrungbinh >= 5) {
                $ketqua = "Được lên lớp";
            } else {
                $ketqua = "Ở lại lớp";
            }

            if ($diemtrungbinh >= 8) {
                $xeploaihocluc = "Giỏi";
            } elseif ($diemtrungbinh >= 6.5 && $diemtrungbinh < 8) {
                $xeploaihocluc = "Khá";
            } elseif ($diemtrungbinh <= 5 && $diemtrungbinh < 6.5) {
                $xeploaihocluc = "Trung bình";
            } else {
                $xeploaihocluc = "Yếu";
            }
        }
    } else {
        $ketqua = "Nhập cái điểm vào ơ???";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả học tập</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">
        <div class="title">
            Kết quả học tập
        </div>
        <div class="from-group-input">
            <div class="form-input">
                <label for="">Điểm HK1:</label>
                <input type="text" name="diemhk1" value="<?php echo $diemhk1; ?>">
            </div>
            <div class="form-input">
                <label for="">Điểm HK2:</label>
                <input type="text" name="diemhk2" value="<?php echo $diemhk2; ?>">
            </div>
            <div class="form-input">
                <label for="">Điểm trung bình:</label>
                <input type="text" name="diemtrungbinh" value="<?php echo $diemtrungbinh_hien_thi ?>" readonly>
            </div>
            <div class="form-input">
                <label for="">Kết quả:</label>
                <input type="text" name="ketqua" value="<?php echo $ketqua; ?>" readonly>
            </div>
            <div class="form-input">
                <label for="">Xếp loại học lực:</label>
                <input type="text" name="xeploaihocluc" value="<?php echo $xeploaihocluc; ?>" readonly>
            </div>
        </div>
        <div class="form-group-btn">
            <button type="submit">Xem kết quả</button>
        </div>
    </form>

</body>

</html>

<!-- Code By Tuancute -->
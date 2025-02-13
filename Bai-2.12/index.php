<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['date'])) {
    $nam = intval($_POST["date"]);

    $soDuCan = ($nam - 3) % 10; {
        switch ($soDuCan) {
            case 0:
                $can = "Quý";
                break;
            case 1:
                $can = "Giáp";
                break;
            case 2:
                $can = "Ất";
                break;
            case 3:
                $can = "Bính";
                break;
            case 4:
                $can = "Đinh";
                break;
            case 5:
                $can = "Mậu";
                break;
            case 6:
                $can = "Kỷ";
                break;
            case 7:
                $can = "Canh";
                break;
            case 8:
                $can = "Tân";
                break;
            case 9:
                $can = "Nhâm";
                break;
        }

        $soDuChi = ($nam - 3) % 12;
        switch ($soDuChi) {
            case 0:
                $chi = "Hợi";
                break;
            case 1:
                $chi = "Tý";
                break;
            case 2:
                $chi = "Sửu";
                break;
            case 3:
                $chi = "Dần";
                break;
            case 4:
                $chi = "Mão";
                break;
            case 5:
                $chi = "Thìn";
                break;
            case 6:
                $chi = "Tỵ";
                break;
            case 7:
                $chi = "Ngọ";
                break;
            case 8:
                $chi = "Mùi";
                break;
            case 9:
                $chi = "Thân";
                break;
            case 10:
                $chi = "Dậu";
                break;
            case 11:
                $chi = "Tuất";
                break;
        }

        $nam_al = $can . " " . $chi;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<!-- Code By Tuancute -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính năm âm lịch</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="POST">
        <div class="title">
            Tính năm âm lịch
        </div>
        <div class="form-group-input">
            <div class="form-input">
                <label for="">Năm dương lịch</label>
                <input type="number" name="date" id="" value="<?php echo $nam; ?>">
            </div>
            <div class=" form-btn">
                <button type="submit">=></button>
            </div>
            <div class="form-input">
                <label for="">Năm âm lịch:</label>
                <input type="text" name="text-date" readonly value="<?php echo $nam_al; ?>">
            </div>
        </div>
    </form>
</body>

</html>

<!-- Code By Tuancute -->
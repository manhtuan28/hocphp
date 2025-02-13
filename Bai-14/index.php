<?php

$month = "";
$year = "";
$result = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $month = $_POST['month'];
    $year = $_POST['year'];
    $result = $_POST['result'];

    if (isset($_POST['month']) && isset($_POST['year'])) {
        switch ($month) {
            case '1':
            case '3':
            case '5':
            case '7':
            case '8':
            case '10':
            case '12':
                $result = "Tháng $month năm $year có 30 ngày";
                break;
            case '4':
            case '6':
            case '9':
            case '11':
                $result = "Tháng $month năm $year có 31 ngày";
                break;
            case '2':
                if ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0)) {
                    $result = "Tháng $month năm $year có 29 ngày";
                } else {
                    $result = "Tháng $month năm $year có 28 ngày";
                }
                break;
            default:
                $result = "Nhập vào đi ơ ???";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tính ngày trong tháng</title>
</head>

<body>
    <form action="" method="POST">
        <div class="title">
            Tính ngày trong tháng
        </div>
        <div class="form-input">
            <div class="box-input">
                <span>Tháng/năm:</span>
                <input type="number" name="month" id="" value="<?php echo $month; ?>" required>
                <span>/</span>
                <input type="number" name="year" id="" value="<?php echo $year; ?>" required>
            </div>
            <div class="box-button">
                <button>Tính số ngày</button>
            </div>
            <div class="box-result">
                <input type="text" name="result" id="" readonly value="<?php echo $result; ?>">
            </div>
        </div>
    </form>
</body>

</html>
<?php
$number = "";
$textNumber = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['number'];
    $textNumber = $_POST['text-number'];

    if ($number != "") {
        switch ($number) {
            case '0':
                $textNumber = "Không";
                break;
            case '1':
                $textNumber = "Một";
                break;
            case '2':
                $textNumber = "Hai";
                break;
            case '3':
                $textNumber = "Ba";
                break;
            case '4':
                $textNumber = "Bốn";
                break;
            case '5':
                $textNumber = "Năm";
                break;
            case '6':
                $textNumber = "Sáu";
                break;
            case '7':
                $textNumber = "Bảy";
                break;
            case '8':
                $textNumber = "Tám";
                break;
            case '9':
                $textNumber = "Chín";
                break;
            default:
                $textNumber = "Nhập từ 0->9 mà ơ???";
                break;
        }
    } else {
        echo "Nhập số vào ơ???";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc số</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="POST">
        <div class="title">
            Đọc số
        </div>
        <div class="form-group-input">
            <div class="form-input">
                <label for="">Nhập số (0->9)</label>
                <input type="number" name="number" id="" value="<?php echo $number; ?>">
            </div>
            <div class="form-btn">
                <button type="submit">=></button>
            </div>
            <div class="form-input">
                <label for="">Bằng chữ:</label>
                <input type="text" name="text-number" readonly value="<?php echo $textNumber; ?>">
            </div>
        </div>
    </form>
</body>

</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start-cuu-chuong']) && isset($_POST['end-cuu-chuong'])) {
        $batDauCH = $_POST['start-cuu-chuong'];
        $ketThucCH = $_POST['end-cuu-chuong'];
    }
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>In bảng cửu chương</title>
</head>

<body>

    <form action="" method="POST">
        <div class="title">
            In bảng cửu chương
        </div>
        <div class="form-input">
            <div class="box-input">
                <span>Bắt đầu từ:</span>
                <input type="number" name="start-cuu-chuong" id="" required>
            </div>
            <div class="box-input">
                <span>Kết thúc từ:</span>
                <input type="number" name="end-cuu-chuong" id="" required>
            </div>
            <div class="box-button">
                <button>In bảng cửu chương</button>
            </div>
        </div>
        <div class="result">

        </div>
    </form>

</body>

</html>

<!-- Code By Tuancute -->
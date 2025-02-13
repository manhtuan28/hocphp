<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    }
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tính toán trên dãy số</title>
</head>

<body>

    <form action="" method="POST">
        <div class="title">
            Tính toán trên dãy số
        </div>
        <div class="box-input-container">
            <span>Giới hạn của dãy số:</span>
            <div class="box-input-card">
                <span>Số bắt đầu:</span>
                <input type="number" name="number-start" id="">
                <span>Số kết thúc:</span>
                <input type="number" name="number-end">
            </div>
        </div>
        <div class="form-input">
            <div class="box-input">
                <span style="color: #834400; font-weight: bold; font-size: 20px;">Kết quả:</span>
                <div class="box-input-result">
                    <span>Tổng các số:</span>
                    <input type="number" name="sum-number" class="result-input" readonly>
                </div>
                <div class="box-input-result">
                    <span>Tích các số:</span>
                    <input type="number" name="multiplication-number" class="result-input" readonly>
                </div>
                <div class="box-input-result">
                    <span>Tổng các số chẵn:</span>
                    <input type="number" name="even-number" class="result-input" readonly>
                </div>
                <div class="box-input-result">
                    <span>Tổng các số lẻ:</span>
                    <input type="number" name="odd-number" class="result-input" readonly>
                </div>
            </div>
            <div class="box-button">
                <button>Tính toán</button>
            </div>
        </div>
    </form>

</body>

</html>

<!-- Code By Tuancute -->
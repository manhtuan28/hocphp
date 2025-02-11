<?php
    
?>

<!DOCTYPE html>
<html lang="vi">

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
                <input type="number" name="date" id="">
            </div>
            <div class=" form-btn">
                <button type="submit">=></button>
            </div>
            <div class="form-input">
                <label for="">Năm âm lịch:</label>
                <input type="text" name="text-date" readonly>
            </div>
        </div>
    </form>
</body>

</html>
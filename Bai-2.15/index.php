<?php
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['number-inp'])) {
    $number = $_POST['number-inp'];
    $result = "";

    for ($i = 1; $i <= 10; $i++) {
        $result .= "$number x $i = " . ($number * $i) . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bảng cửu chương</title>
</head> 

<body>
    <form action="" method="post">
        <div class="head-container">
            <div class="title">
                Bảng cửu chương
            </div>
            <div class="box-input">
                <span>Cửu chương:</span>
                <input type="number" name="number-inp" id="" value="<?php echo $number; ?>">
                <button type="submit">Thực hiện</button>
            </div>
        </div>
        <div class="result-container">
            <div class="box-result">
                <div class="title">Kết Quả</div>
                <div class="result">
                    <?php echo $result; ?>
                </div>
            </div>
        </div>
    </form>
</body>

</html>

<!-- Code By Tuancute -->
<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start-cuu-chuong']) && isset($_POST['end-cuu-chuong'])) {
    $batDauCH = $_POST['start-cuu-chuong'];
    $ketThucCH = $_POST['end-cuu-chuong'];

    if ($batDauCH > $ketThucCH) {
        $temp = $batDauCH;
        $batDauCH = $ketThucCH;
        $ketThucCH = $temp;
    }
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
        <div class="title">In bảng cửu chương</div>
        <div class="form-input">
            <div class="box-input">
                <span>Bắt đầu từ:</span>
                <input type="number" name="start-cuu-chuong" required value="<?php echo htmlspecialchars($batDauCH); ?>">
            </div>
            <div class="box-input">
                <span>Kết thúc tại:</span>
                <input type="number" name="end-cuu-chuong" required value="<?php echo htmlspecialchars($ketThucCH); ?>">
            </div>
            <div class="box-button">
                <button type="submit">In bảng cửu chương</button>
            </div>
        </div>
    </form>

    <?php if (!empty($batDauCH) && !empty($ketThucCH)) : ?>
        <div class="result">
            <?php
            for ($num = $batDauCH; $num <= $ketThucCH; $num++) {
                echo "<div class='cuu-chuong'>";
                echo "<br>";
                for ($i = 1; $i <= 10; $i++) {
                    echo "<p>$num x $i = " . ($num * $i) . "</p>";
                }
                echo "</div>";
            }
            ?>
        </div>
    <?php endif; ?>
</body>

</html>

<!-- Code By Tuancute -->
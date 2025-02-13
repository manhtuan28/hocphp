<?php

define("PI", 3.14);

$bankinh = "";
$dientich = "";
$chuvi = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bankinh = $_POST['bankinh'];
    $dientich = $_POST['dientich'];
    $chuvi = $_POST['chuvi'];

    if(!empty($bankinh)) {
        $dientich = PI * pow($bankinh,2);
        $chuvi = 2 * PI * $bankinh;
    }
    else {
        $dientich = "Nhập diện tích vào đi ơ??";
        $chuvi = "Nhập chu vi vào đi ơ??";
    }
}

?>

<!-- Code By Tuancute -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện tích và chu vi hình tròn</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="index.php" method="POST">
        <div class="title">
            <h3>Diện tích và chu vi hình tròn</h3>
        </div>
        <div class="box-form-inp">
            <div class="box-input">
                <label for="">Bán kính: </label>
                <input type="number" name="bankinh" value="<?php echo $bankinh ?>">
            </div>
            <div class="box-input">
                <label for="">Diện tích: </label>
                <input type="text" name="dientich" style="background-color: #ffcbcb;" value="<?php echo $dientich ?>" readonly>
            </div>
            <div class="box-input">
                <label for="">Chu vi: </label>
                <input type="text" name="chuvi" style="background-color: #ffcbcb;" value="<?php echo $chuvi ?>" readonly>
            </div>
        </div>
        <div class="box-form-btn">
            <button type="submit">Tính</button>
        </div>
    </form>
</body>

</html>

<!-- Code By Tuancute -->
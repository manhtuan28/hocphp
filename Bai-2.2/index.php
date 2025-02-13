<?php

$chieudai = "";
$chieurong = "";
$ketqua = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $chieudai = $_POST['chieudai'];
    $chieurong = $_POST['chieurong'];
    $ketqua = $_POST['ketqua'];

    if(!empty($chieudai) && !empty($chieurong)) {
        $ketqua = $chieudai * $chieurong;
    }
    else {
        $ketqua = "Nhập đủ thông vào đi ơ??";
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính diện tích hình chữ nhật</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="index.php" method="POST">
        <div class="title">
            <h3>Diện tích hình chữ nhật</h3>
        </div>
        <div class="box-form-inp">
            <div class="box-input">
                <label for="">Chiều dài: </label>
                <input type="number" name="chieudai" value="<?php echo $chieudai; ?>">
            </div>
            <div class="box-input">
                <label for="">Chiều rộng: </label>
                <input type="number" name="chieurong" value="<?php echo $chieurong; ?>">
            </div>
            <div class="box-input">
                <label for="">Diện tích: </label>
                <input type="text" name="ketqua" style="background-color: #ffcbcb;" value="<?php echo $ketqua; ?>" readonly>
            </div>
        </div>
        <div class="box-form-btn">
            <button type="submit">Tính</button>
        </div>
    </form>

</body>

</html>

<!-- Code By Tuancute -->
<?php
$gio = "";
$chao = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gio = $_POST['gio'];

    if (!empty($gio)) {
        if ($gio >= 6 && $gio <= 12) {
            $chao = "Xin chào buổi sáng!";
        } elseif ($gio > 12 && $gio <= 13) {
            $chao = "Xin chào buổi trưa!";
        } elseif ($gio > 13 && $gio <= 18) {
            $chao = "Xin chào buổi chiều!";
        } elseif ($gio > 18 && $gio <= 22) {
            $chao = "Xin chào buổi tối!";
        } elseif ($gio >= 25) {
            $chao = "Một ngày có 24h thôi ông tướng ạ??? Nhập từ 00h(24h) -> 23h thôi!";
        } else {
            $chao = "Đêm rồi ngủ đi ơ???";
        }
    } else {
        $chao = "Nhập giờ vào ơ???";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào theo giờ</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="POST">
        <div class="title">
            Chào theo giờ
        </div>
        <div class="form-group-input">
            <label for="">Nhập giờ:</label>
            <input type="number" name="gio" value="<?php echo $gio; ?>">
        </div>
        <div class="chao">
            <?php
            echo $chao;
            ?>
        </div>
        <div class="form-group-button">
            <button type="submit">Chào</button>
        </div>
    </form>
</body>

</html>
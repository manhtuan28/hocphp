<?php
$noidung = "";
$maunen = "";
$mauchu = "";
$ketqua = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $noidung = htmlspecialchars($_POST['noidung']);
    $maunen = htmlspecialchars($_POST['maunen']);
    $mauchu = htmlspecialchars($_POST['mauchu']);

    if (!empty($noidung) && !empty($maunen) && !empty($mauchu)) {
        $ketqua = "<div style='background-color: $maunen; color: $mauchu; width: 370px; text-align: center; font-size: 20px; padding: 5px;'>$noidung</div>";
    } else {
        $ketqua = "<div style='color: red; font-size: 30px;'>Nhập vào đi ơ??<div>";
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Màu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="index.php" method="POST">
        <div class="title">
            <h3>Định màu chữ - màu nền</h3>
        </div>
        <div class="box-form-inp">
            <div class="box-input">
                <lable for="">Nội dung: </lable>
                <input type="text" name="noidung" value="<?php echo $noidung ?>">
            </div>
            <div class="box-input">
                <lable for="">Màu nền: </lable>
                <input type="text" name="maunen" value="<?php echo $maunen ?>">
            </div>
            <div class="box-input">
                <lable for="">Màu chữ: </lable>
                <input type="text" name="mauchu" value="<?php echo $mauchu ?>">
            </div>
        </div>
        <div class="box-form-btn">
            <button type="submit">Xem kết quả</button>
        </div>
        <div class="ketqua">
            <?php
            echo $ketqua;
            ?>
        </div>
    </form>

</body>

</html>

<!-- Code By Tuancute -->
<?php

$tenchuho = "";
$chisocu = "";
$chisomoi = "";
$dongia = 2000;
$sotienthanhtoan = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenchuho = $_POST['tenchuho'];
    $chisocu = $_POST['chisocu'];
    $chisomoi = $_POST['chisomoi'];
    $dongia = $_POST['dongia'];

    if (!empty($chisocu) && !empty($chisomoi) && !empty($dongia) && !empty($tenchuho)) {
        $sotienthanhtoan = ($chisomoi - $chisocu) * $dongia;
    } else {
        $sotienthanhtoan = "Nhập đủ thông vào đi ơ??";
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toàn tiền điện</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">
        <div class="title">Thanh toán tiền điện</div>
        <div class="box-form-input">
            <div class="form-input">
                <label for="">Tên chủ hộ:</label>
                <input type="text" name="tenchuho" value="<?php echo $tenchuho ?>">
            </div>
            <div class="form-input">
                <label for="">Chỉ số cũ:</label>
                <input type="number" name="chisocu" value="<?php echo $chisocu ?>">
                <span>(Kw)</span>
<!-- Code By Tuancute -->
            </div>
            <div class="form-input">
                <label for="">Chỉ số mới:</label>
                <input type="number" name="chisomoi" value="<?php echo $chisomoi ?>">
                <span>(Kw)</span>
            </div>
            <div class="form-input">
                <label for="">Đơn giá:</label>
                <input type="number" name="dongia" value="<?php echo $dongia ?>">
                <span>(VNĐ)</span>
            </div>
            <div class="form-input">
                <label for="">Số tiền thanh toán:</label>
                <input type="text" name="sotienthanhtoan" readonly style="background-color: #fecccd;" value="<?php echo $sotienthanhtoan ?>">
                <span>(VNĐ)</span>
            </div>
        </div>
        <div class="box-form-btn">
            <button type="submit">Tính</button>
        </div>
    </form>

</body>

</html>

<!-- Code By Tuancute -->
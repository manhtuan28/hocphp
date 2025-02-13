<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $daySo = $_POST['daySo'];
    if (isset($daySo)) {
        $chuoiSo = trim($_POST['daySo']);
        $mangSo = array_map('floatval', explode(",", $daySo));
        $sum = array_sum($mangSo);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập và tính trên dãy số</title>
</head>

<body>

    <form action="" method="POST">
        <div class="title">
            Nhập và tính trên dãy số
        </div>
        <div class="form-input">
            <div class="box-input">
                <span>Nhập dãy số:</span>
                <input type="text" name="daySo" id="" value="<?php echo $daySo; ?>">
            </div>
            <div class="box-button">
                <button>Tổng dãy số</button>
            </div>
            <div class="box-input">
                <span>Tổng dãy số:</span>
                <input type="text" name="result" id="" readonly value="<?php echo $sum; ?>">
            </div>
        </div>
    </form>

</body>

</html>
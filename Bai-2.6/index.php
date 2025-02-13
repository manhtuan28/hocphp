<?php
    $numberA = "";
    $numberB = "";
    $ketqua = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numberA = $_POST['numberA'];
        $numberB = $_POST['numberB'];

        if(!empty($numberA) && !empty($numberB)) {
            $ketqua = ($numberA > $numberB) ? $numberA : $numberB;
        }
        else {
            $ketqua = "Nhập số vào đi ơ???";
        }
    }

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm số lớn hơn</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!-- Code By Tuancute -->

    <form action="" method="POST">
        <div class="title">Tìm số lớn hơn</div>
        <div class="form-group-input">
            <div class="form-input">
                <label for="">Cạnh A:</label>
                <input type="number" name="numberA" value="<?php echo $numberA ?>">
            </div>
            <div class="form-input">
                <label for="">Cạnh B:</label>
                <input type="number" name="numberB" value="<?php echo $numberB ?>">
            </div>
            <div class="form-input">
                <label for="">Số lớn hơn:</label>
                <input type="text" style="background-color: #fccccc;" value="<?php echo $ketqua; ?>" readonly>
            </div>
        </div>
        <div class="form-group-btn">
            <button type="submit">Tìm</button>
        </div>
    </form>

</body>

</html>

<!-- Code By Tuancute -->
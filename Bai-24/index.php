<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hoVaTen = $_POST['hoVaTen'];
    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $tenDem = $_POST['tenDem'];

    $mang = explode(" ", trim($_POST['hoVaTen']));
    $ho = array_shift($mang);
    $ten = array_pop($mang);
    $tenDem = implode(" ", $mang);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tách họ và tên</title>
</head>

<body>
    <form action="" method="POST">
        <div class="title">
            Tách họ và tên
        </div>
        <div class="form-input">
            <div class="box-input">
                <span>Họ và tên:</span>
                <input type="text" name="hoVaTen" id="" value="<?php echo $hoVaTen; ?>">
            </div>
            <div class="box-input">
                <span>Họ:</span>
                <input type="text" name="ho" id="" readonly value="<?php echo $ho; ?>">
            </div>
            <div class="box-input">
                <span>Tên đệm:</span>
                <input type="text" name="tenDem" id="" readonly value="<?php echo $tenDem; ?>">
            </div>
            <div class="box-input">
                <span>Tên:</span>
                <input type="text" name="ten" id="" readonly value="<?php echo $ten; ?>">
            </div>
            <div class="box-button">
                <button>Tách Họ Tên</button>
            </div>
        </div>
    </form>
</body>

</html>
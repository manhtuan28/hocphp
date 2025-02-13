<?php
    error_reporting(0);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $chuoi = $_POST['chuoi'];
        $tuGoc = $_POST['tuGoc'];
        $tuThayThe = $_POST['tuThayThe'];

        if(isset($chuoi) && isset($tuGoc) && isset($tuThayThe)) {
            $chuoi_moi = str_replace($tuGoc,$tuThayThe,$chuoi);

            $result = $chuoi_moi;
        }
        else {
            $result = "Vui lòng nhập thông tin.";
        }
    }

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Thay thế chuỗi</title>
</head>
<body>
    <form action="" method="POST">
        <div class="title">
            Thay thế từ trong chuỗi
        </div>
        <div class="form-input">
            <div class="box-input">
                <span>Chuỗi:</span>
                <input type="text" name="chuoi" id="" required value="<?php echo $chuoi; ?>">
            </div>
            <div class="box-input">
                <span>Từ gốc:</span>
                <input type="text" name="tuGoc" id="" required value="<?php echo $tuGoc; ?>">
            </div>
            <div class="box-input">
                <span>Từ thay thế:</span>
                <input type="text" name="tuThayThe" id="" required value="<?php echo $tuThayThe; ?>">
            </div>
            <div class="box-button">
                <button>Thay thế</button>
            </div>
            <div class="box-result">
                <input type="text" name="result" id="result" readonly value="<?php echo $result; ?>">
            </div>
        </div>
    </form>
</body>
</html>
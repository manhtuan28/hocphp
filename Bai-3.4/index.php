<?php
error_reporting(0);

function tim_hoa($tenHoa, $mangHoa)
{

    for ($i = 0; $i < count($mangHoa); $i++) {
        if (strcasecmp($tenHoa, $mangHoa[$i]) == 0) {
            return true;
        }
    }
    return false;
}

if (isset($_POST['loaiHoa'])) {
    $tenHoa = trim($_POST['loaiHoa']);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mua hoa</title>
</head>

<body>
    <form action="" method="post">
        <div class="title">
            Mua Hoa
        </div>

        <div class="box-inp">
            <span>Loại hoa bạn chọn:</span>
            <input type="text" name="loaiHoa" id="" value="<?php echo $tenHoa; ?>">
            <button type="submit">Thêm vào giỏ hoa</button>
        </div>
        <div class="box-inp">
            <span>Giỏ hoa của bạn có:</span>
            <textarea name="ketQua" id=""></textarea>
        </div>
    </form>
</body>

</html>
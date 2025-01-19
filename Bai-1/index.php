<?php
$username = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);

    if (!empty($username)) {
        $username = "Chào bạn, $username";
    } else {
        $error = "Nhập đủ thông vào đi ơ??";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xin chào</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">
        <div class="title">
            <h3>IN LỜI CHÀO</h3>
        </div>
        <div class="box-form-inp">
            <label for="">Họ tên của bạn</label>
            <input type="text" name="username" value="<?php echo $username ?>">
        </div>
        <div class="ketqua">
            <?php
            echo $username;
            echo $error;
            ?>
        </div>
        <div class="box-form-btn">
            <button type="submit">Chào</button>
        </div>
    </form>

</body>

</html>

<!-- Code By Tuancute -->
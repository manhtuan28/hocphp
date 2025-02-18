<?php
error_reporting(0);

function kt_snt($so)
{
    if ($so < 2) {
        return 0;
    }

    for ($i = 2; $i <= sqrt($so); $i++) {
        if ($so % $i == 0) {
            return 0;
        }
    }
    return 1;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number_nt = $_POST['number-nt'];

    if (isset($_POST['number-nt'])) {
        for($i = 2; $i <= $number_nt; $i++) {
            if(kt_snt($i)) {
                $kq .= $i." ";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tìm số nguyên tố</title>
</head>

<body>
    <form action="" method="POST">
        <div>
            <span>Nhập N: </span>
            <input type="number" name="number-nt" id="" value="<?php echo $number_nt; ?>" required>
        </div>
        <div>
            <button name="submit" type="submit">Các số nguyên tố <= N</button>
        </div>
        <div>
            <input type="text" name="result" id="" readonly value="<?php echo $kq; ?>">
        </div>
    </form>
</body>

</html>
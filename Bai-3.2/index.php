<?php
error_reporting(0);

function kiem_tra_nhuan($nam)
{
    if ($nam % 400 == 0 || $nam % 4 == 0 && $nam % 100 != 0) {
        return 1;
    }
    return 0;
}

function in_ra_nam_nhuan($nam)
{
    $nam_nhuan = [];

    foreach (range(2000, $nam) as $year) {
        if (kiem_tra_nhuan($year)) {
            $nam_nhuan[] = $year;
        }
    }

    return $nam_nhuan;
}

if (isset($_POST['nam-nhap'])) {
    $nam = $_POST['nam-nhap'];

    $ketQua = implode(",", in_ra_nam_nhuan($nam));
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm năm nhuận</title>
</head>

<body>
    <form action="" method="post">
        <div class="title">
            Tìm năm nhuận
        </div>
        <div class="box-inp">
            <span>Năm:</span>
            <input type="text" name="nam-nhap" id="" value="<?php echo $nam; ?>">
        </div>
        <div class="box-result">
            <input type="text" name="ketQua" id="" value="<?php echo $ketQua; ?>">
        </div>
        <div class="box-button">
            <button type="submit">Tìm năm nhuận</button>
        </div>
    </form>
</body>

</html>
<?php
error_reporting(0);


if (isset($_POST['nhapNam'])) {
    $nam = $_POST['nhapNam'];

    $mang_can = array(
        "Quý",
        "Giáp",
        "Ất",
        "Bính",
        "Đinh",
        "Mậu",
        "Kỷ",
        "Canh",
        "Tân",
        "Nhâm"
    );

    $mang_chi = array(
        "Hợi",
        "Tý",
        "Sửu",
        "Dần",
        "Mão",
        "Thìn",
        "Tỵ",
        "Ngọ",
        "Mùi",
        "Thân",
        "Dậu",
        "Tuất"
    );

    $mang_hinh = array(
        "hoi.webp",
        "ty.webp",
        "suu.png",
        "dan.jpg",
        "mao.jpg",
        "thin.jpg",
        "ty-ran.webp",
        "ngo.png",
        "mui.jpg",
        "than.webp",
        "dau.webp",
        "tuat.jpg"
    );

    $can_index = ($nam - 3) % 10;
    $chi_index = ($nam - 3) % 12;

    $can = $mang_can[$can_index];
    $chi = $mang_chi[$chi_index];

    $nam_am_lich = $can . " " . $chi;
    $hinh_anh = $mang_hinh[$chi_index];
}

?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tính năm âm lịch</title>
</head>

<body>
    <form action="" method="post">
        <div class="title">
            Tính năm âm lịch
        </div>
        <div class="box-inp">
            <span>Năm dương lịch</span>
            <input type="text" name="nhapNam" id="" value="<?php echo $nam; ?>">
            <button type="submit">=></button>
            <span>Năm âm lịch</span>
            <input type="text" name="namAmLich" id="" readonly value="<?php echo $nam_am_lich; ?>">
        </div>
        <div class="result-img">
            <img src="<?php echo $hinh_anh; ?>" alt="">
        </div>
    </form>
</body>

</html>
<?php
$numberA = "";
$numberB = "";
$nghiem = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numberA = $_POST['numberA'];
    $numberB = $_POST['numberB'];
    $nghiem = $_POST['nghiem'];

    if ($numberA != "" || $numberB != "") {
        if ($numberA == 0) {
            if ($numberB == 0) {
                $nghiem = "Phương trình có vô số nghiệm";
            } else {
                $nghiem = "Phương trình vô nghiệm";
            }
        } else {
            $nghiem = -$numberB / $numberA;
            $nghiem = "x = $nghiem";
        }
    } else {
        echo "Nhập số vào đi ơ???";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải phương trình bậc nhất</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="POST">
        <div class="title">
            Giải phương trình bậc nhất
        </div>
        <div class="form-group-input">
            <div class="form-input">
                <label for="">Phương trình:</label>
                <input type="number" step="any" name="numberA" id="" value="<?php echo $numberA; ?>">
                <span>x +</span>
                <input type="number" step="any" name="numberB" id="" value="<?php echo $numberB; ?>">
                <span> = 0</span>
            </div>
            <div class="form-input">
                <label for="" style="margin-right: 49px;">Nghiệm:</label>
                <input type="text" name="nghiem" id="" readonly value="<?php echo $nghiem; ?>">
            </div>
        </div>
        <div class="form-group-btn">
            <button type="submit">Giải phương trình</button>
        </div>
    </form>
</body>

</html>
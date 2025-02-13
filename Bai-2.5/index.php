<?php
    $numberA = "";
    $numberB = "";
    $ketqua = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numberA = $_POST['numberA'];
        $numberB = $_POST['numberB'];

        if(!empty($numberA) && !empty($numberB)) {
            $ketqua = sqrt(pow($numberA,2)+pow($numberB,2));
        }
        else {
            $ketqua = "Nhập các cạnh vào đi ơ??";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cạnh huyền tam giác vuông</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="" method="POST">
        <div class="title">Cạnh huyền tam giác vuông</div>
        <div class="form-group-input">
            <div class="form-input">
                <label for="">Cạnh A:</label>
                <input type="number" name="numberA" value="<?php echo $numberA; ?>">
            </div>
            <div class="form-input">
                <label for="">Cạnh B:</label>
                <input type="number" name="numberB" value="<?php echo $numberB ?>">
            </div>
            <div class="form-input">
                <label for="">Cạnh huyền:</label>
                <input type="text" style="background-color: #fccccc;" value="<?php echo $ketqua; ?>" readonly>
            </div>
        </div>
        <div class="form-group-btn">
            <button type="submit">Tính</button>
        </div>
    </form>

</body>

</html>
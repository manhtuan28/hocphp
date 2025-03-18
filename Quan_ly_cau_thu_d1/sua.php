<?php
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}

?>

<?php
$queryCheck = mysqli_query($conn, "SELECT * FROM thongtincauthu WHERE maSo = '$ma'");
$rowCheck = mysqli_fetch_assoc($queryCheck);
?>

<?php
if (isset($_POST['sua'])) {
    $maCauThu = $_POST['maSo'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $viTri = $_POST['viTri'];
    $clb = $_POST['clb'];

    $query = mysqli_query($conn, "UPDATE thongtincauthu SET maSo = '$maCauThu', hoTen = '$hoTen', ngaySinh = '$ngaySinh', viTri = '$viTri', CLB_ID = '$clb' WHERE maSo = '$ma'");
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Cầu Thủ</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input,
        select {
            width: 90%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            margin: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            transition: 0.3s;
            border: none;
        }

        .btn-sua {
            background-color: #28a745;
        }

        .btn-sua:hover {
            background-color: #218838;
        }

        .btn-huy {
            background-color: #dc3545;
        }

        .btn-huy:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Sửa Cầu Thủ</h2>

        <form action="#" method="POST">
            <label for="maSo">Mã cầu thủ:</label>
            <input type="text" id="maSo" name="maSo" required value="<?php echo $rowCheck['maSo']; ?>">

            <label for="hoTen">Họ và Tên:</label>
            <input type="text" id="hoTen" name="hoTen" required value="<?php echo $rowCheck['hoTen']; ?>">

            <label for="ngaySinh">Ngày Sinh:</label>
            <input type="date" id="ngaySinh" name="ngaySinh" required value="<?php echo $rowCheck['ngaySinh']; ?>">

            <label for="viTri">Vị trí:</label>
            <input type="text" id="viTri" name="viTri" required value="<?php echo $rowCheck['viTri']; ?>">

            <label for="clb">Câu Lạc Bộ:</label>
            <select name="clb" id="clb" require>
                <?php
                $queryCLB = mysqli_query($conn, "SELECT * FROM caulacbo");
                if (mysqli_num_rows($queryCLB) > 0) {
                    while ($rowCLB = mysqli_fetch_assoc($queryCLB)) {
                        if ($rowCLB['maCLB'] == $rowCheck['CLB_ID']) {
                            echo "<option value='{$rowCLB['maCLB']}' selected>{$rowCLB['tenCLB']}</option>";
                        } else {
                            echo "<option value='{$rowCLB['maCLB']}'>{$rowCLB['tenCLB']}</option>";
                        }
                    }
                }
                ?>
            </select>

            <div class="btn-container">
                <button type="submit" class="btn btn-sua" name="sua">➕ Lưu</button>
                <a href="index.php" class="btn btn-huy">❌ Hủy</a>
            </div>
        </form>
    </div>

</body>

</html>
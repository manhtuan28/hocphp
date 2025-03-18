<?php
require_once "connect.php";
?>

<?php
if (isset($_POST['them'])) {
    $maCauThu = $_POST['maSo'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $viTri = $_POST['viTri'];
    $clb = $_POST['clb'];

    $query = mysqli_query($conn, "INSERT INTO thongtincauthu(maSo, hoTen, ngaySinh, viTri, CLB_ID) VALUES('$maCauThu', '$hoTen', '$ngaySinh', '$viTri','$clb')");
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Cầu Thủ</title>
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

        .btn-them {
            background-color: #28a745;
        }

        .btn-them:hover {
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
        <h2>Thêm Cầu Thủ</h2>

        <form action="#" method="POST">
            <label for="maSo">Mã cầu thủ:</label>
            <input type="text" id="maSo" name="maSo" required>

            <label for="hoTen">Họ và Tên:</label>
            <input type="text" id="hoTen" name="hoTen" required>

            <label for="ngaySinh">Ngày Sinh:</label>
            <input type="date" id="ngaySinh" name="ngaySinh" required>

            <label for="viTri">Vị trí:</label>
            <input type="text" id="viTri" name="viTri" required>

            <label for="clb">Câu Lạc Bộ:</label>
            <select name="clb" id="clb" require>
                <option value="">-- Chọn câu lạc bộ --</option>
                <?php
                $queryCLB = mysqli_query($conn, "SELECT * FROM caulacbo");
                if (mysqli_num_rows($queryCLB) > 0) {
                    while ($rowCLB = mysqli_fetch_assoc($queryCLB)) {
                        echo "<option value='{$rowCLB['maCLB']}'>{$rowCLB['tenCLB']}</option>";
                    }
                }
                ?>
            </select>

            <div class="btn-container">
                <button type="submit" class="btn btn-them" name="them">➕ Thêm</button>
                <a href="index.php" class="btn btn-huy">❌ Hủy</a>
            </div>
        </form>
    </div>

</body>

</html>
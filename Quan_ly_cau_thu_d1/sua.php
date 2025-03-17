<?php
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}

$queryDL = mysqli_query($conn, "SELECT * FROM thongtincauthu WHERE maSo = '$ma'");
$row = mysqli_fetch_assoc($queryDL);
?>

<?php
if (isset($_POST['sua'])) {
    $maSo = $_POST['maSo'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $viTri = $_POST['viTri'];
    $clb = $_POST['clb'];

    $query = mysqli_query($conn, "UPDATE thongtincauthu SET maSo = '$maSo', hoTen = '$hoTen', ngaySinh = '$ngaySinh', viTri = '$viTri', CLB_ID = '$clb' WHERE maSo = '$ma'");
    header("location: index.php");
}
?>

<title>Thêm mới cầu thủ</title>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 950px;
        height: auto;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table th,
    table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f8f9fa;
        color: #333;
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        margin-top: 10px;
        padding: 10px 20px;
        cursor: pointer;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .sua-btn {
        background-color: #28a745;
    }

    .sua-btn:hover {
        background-color: #218838;
    }

    a {
        display: inline-block;
        margin-bottom: 20px;
        color: #007bff;
        text-decoration: none;
        font-size: 16px;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<form action="" method="post">
    <div class="container">
        <a href="index.php">Quay lại trang chủ</a>
        <h2 style="text-align: center;">THÊM MỚI CẦU THỦ</h2>
        <table align="center">
            <tr>
                <th>Mã số cầu thủ:</th>
                <td><input type="text" name="maSo" id="" value="<?php echo $row['maSo']; ?>"></td>
            </tr>
            <tr>
                <th>Họ tên cầu thủ:</th>
                <td><input type="text" name="hoTen" id="" value="<?php echo $row['hoTen']; ?>"></td>
            </tr>
            <tr>
                <th>Ngày sinh:</th>
                <td><input type="date" name="ngaySinh" id="" value="<?php echo $row['ngaySinh']; ?>"></td>
            </tr>
            <tr>
                <th>Vị trí:</th>
                <td><input type="text" name="viTri" id="" value="<?php echo $row['viTri']; ?>"></td>
            </tr>
            <tr>
                <th>Câu lạc bộ:</th>
                <td>
                    <select name="clb" id="">
                        <?php
                        $queryCLB = mysqli_query($conn, "SELECT * FROM caulacbo");

                        if (mysqli_num_rows($queryCLB) > 0) {
                            while ($rowCLB = mysqli_fetch_assoc($queryCLB)) {
                                if ($rowCLB['maCLB'] == $row['CLB_ID']) {
                                    echo "<option value='{$rowCLB['maCLB']}' selected>{$rowCLB['tenCLB']}</option>";
                                } else {
                                    echo "<option value='{$rowCLB['maCLB']}'>{$rowCLB['tenCLB']}</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <button type="submit" name="sua" class="sua-btn">Sửa</button>
                </td>
            </tr>
        </table>
    </div>
</form>
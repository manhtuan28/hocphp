<?php
error_reporting(0);
require_once "connect.php";
?>

<?php
if (isset($_POST['them'])) {
    $malop = $_POST['malop'];
    $tenlop = $_POST['tenlop'];
    $giaovienCN = $_POST['giaovienCN'];
    $siso = $_POST['siso'];
    $phonghoc = $_POST['phonghoc'];

    $queryCheck = mysqli_query($conn, "SELECT * FROM lop WHERE malop = '$malop'");

    if ($malop == "") {
        $errmalop = "Vui lòng nhập mã lớp";
    }
    if ($tenlop == "") {
        $errtenlop = "Vui lòng nhập tên lớp";
    }
    if ($giaovienCN == "") {
        $errgiaovienCN = "Vui lòng nhập tên giáo viên chủ nhiệm";
    }
    if ($siso == "") {
        $errsiso = "Vui lòng nhập sĩ số";
    }
    if ($phonghoc == "") {
        $errphonghoc = "Vui lòng nhập phòng học";
    }

    if ($malop != "" && $tenlop != "" && $giaovienCN != "" && $siso != "" && $phonghoc != "") {
        if (mysqli_num_rows($queryCheck) > 0) {
            $errmalopcheck = "Mã lớp đã tồn tại, vui lòng nhập mã khác";
        } else {
            $query = mysqli_query($conn, "INSERT INTO `lop`(`malop`, `tenlop`, `giaovienCN`, `siso`, `phonghoc`) 
                VALUES ('$malop','$tenlop','$giaovienCN','$siso','$phonghoc')");
            header("location: index.php");
        }
    }
}
?>

<title>Thêm lớp</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 0;
    }

    .form-container {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        width: 400px;
        max-width: 90%;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
        text-align: center;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #555;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .btn {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        margin-top: 15px;
        transition: 0.3s;
    }

    .btn:hover {
        background-color: #218838;
    }

    .btn-back {
        background-color: #6c757d;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        display: block;
        margin-bottom: 15px;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-back:hover {
        background-color: #5a6268;
    }

    span {
        color: #e74c3c;
        font-size: 13px;
        font-style: italic;
        margin-top: -8px;
        margin-bottom: 10px;
        display: block;
    }
</style>
<div class="form-container">
    <a href="index.php" class="btn-back">Quay lại trang chủ</a>
    <h2>Thêm lớp</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="malop">Mã lớp</label>
            <input type="text" name="malop" id="" placeholder="Nhập mã lớp" value="<?php echo $malop; ?>">
            <span><?php echo $errmalop; ?></span>
            <span><?php echo $errmalopcheck; ?></span>
        </div>
        <div class="form-group">
            <label for="tenlop">Tên lớp</label>
            <input type="text" name="tenlop" id="" placeholder="Nhập tên lớp" value="<?php echo $tenlop; ?>">
            <span><?php echo $errtenlop; ?></span>
        </div>
        <div class="form-group">
            <label for="giaoviencn">Giáo viên chủ nhiệm</label>
            <input type="text" name="giaovienCN" id="" placeholder="Nhập tên giáo viên chủ nhiệm" value="<?php echo $giaovienCN; ?>">
            <span><?php echo $errgiaovienCN; ?></span>
        </div>
        <div class="form-group">
            <label for="siso">Sĩ số</label>
            <input type="number" name="siso" id="" min="0" placeholder="Nhập sĩ số" value="<?php echo $siso; ?>">
            <span><?php echo $errsiso; ?></span>
        </div>
        <div class="form-group">
            <label for="phonghoc">Phòng học</label>
            <input type="text" name="phonghoc" id="" placeholder="Nhập tên phòng học" value="<?php echo $phonghoc; ?>">
            <span><?php echo $errphonghoc; ?></span>
        </div>
        <button type="submit" name="them" class="btn">Thêm</button>
    </form>
</div>
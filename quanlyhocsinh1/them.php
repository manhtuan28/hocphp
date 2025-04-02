<?php
error_reporting(0);
require_once "connect.php";
?>

<?php
if (isset($_POST['them'])) {
    $mahocsinh = $_POST['mahocsinh'];
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $noisinh = $_POST['noisinh'];
    $lop = $_POST['lop'];

    $queryCheck = mysqli_query($conn, "SELECT * FROM hocsinh WHERE mahocsinh = '$mahocsinh'");

    if ($mahocsinh == "") {
        $errmahocsinh = "Vui lòng nhập mã học sinh";
    }
    if ($hoten == "") {
        $errhoten = "Vui lòng nhập họ tên";
    }
    if ($ngaysinh == "") {
        $errngaysinh = "Vui lòng chọn ngày sinh";
    }
    if ($gioitinh == "") {
        $errgioitinh = "Vui lòng chọn giới tính";
    }
    if ($noisinh == "") {
        $errnoisinh = "Vui lòng nhập nơi sinh";
    }
    if ($lop == "") {
        $errlop = "Vui lòng chọn lớp";
    }

    if ($mahocsinh != "" && $hoten != "" && $ngaysinh != "" && $gioitinh != "" && $noisinh != "" && $lop != "") {
        if (mysqli_num_rows($queryCheck) > 0) {
            $errcheckMaHS = "Mã học sinh đã tồn tại, vui lòng chọn mã khác!";
        } else {
            $query = mysqli_query($conn, "INSERT INTO `hocsinh`(`mahocsinh`, `hoten`, `ngaysinh`, `gioitinh`, `noisinh`, `malop`) 
                VALUES ('$mahocsinh','$hoten','$ngaysinh','$gioitinh','$noisinh','$lop')");
            header("location: index.php");
        }
    }
}
?>

<title>Thêm học sinh</title>
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

    input,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .radio-group {
        display: inline-flex;
        margin-bottom: 10px;
        gap: 6px;
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
    <h2>Thêm học sinh</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="mahocsinh">Mã học sinh</label>
            <input type="text" name="mahocsinh" id="mahocsinh" placeholder="Nhập mã học sinh">
            <span><?php echo $errcheckMaHS; ?></span>
            <span><?php echo $errmahocsinh; ?></span>
        </div>
        <div class="form-group">
            <label for="hoten">Họ tên</label>
            <input type="text" name="hoten" id="hoten" placeholder="Nhập họ tên">
            <span><?php echo $errhoten; ?></span>
        </div>
        <div class="form-group">
            <label for="ngaysinh">Ngày sinh</label>
            <input type="date" name="ngaysinh" id="ngaysinh">
            <span><?php echo $errngaysinh; ?></span>
        </div>
        <div class="form-group">
            <label for="gioitinh">Giới tính</label>
            <div class="radio-group">
                <input type="radio" name="gioitinh" id="nam" value="Nam">
                <label for="nam">Nam</label>
                <input type="radio" name="gioitinh" id="nu" value="Nữ">
                <label for="nu">Nữ</label>
                <input type="radio" name="gioitinh" id="lbpt" value="LGBT">
                <label for="lbpt">LGBT</label>
            </div>
            <span><?php echo $errgioitinh; ?></span>
        </div>
        <div class="form-group">
            <label for="noisinh">Nơi sinh</label>
            <input type="text" name="noisinh" id="noisinh" placeholder="Nhập nơi sinh">
            <span><?php echo $errnoisinh; ?></span>
        </div>
        <div class="form-group">
            <label for="lop">Lớp</label>
            <select name="lop" id="lop">
                <option value="">-- Chọn lớp --</option>
                <?php
                $queryLop = mysqli_query($conn, "SELECT * FROM lop");
                if (mysqli_num_rows($queryLop) > 0) {
                    while ($rowLop = mysqli_fetch_assoc($queryLop)) {
                        echo "<option value='{$rowLop['malop']}'>{$rowLop['malop']}-{$rowLop['tenlop']}</option>";
                    }
                }
                ?>
            </select>
            <span><?php echo $errlop; ?></span>
        </div>
        <button type="submit" name="them" class="btn">Thêm học sinh</button>
    </form>
</div>
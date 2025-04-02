<?php
error_reporting(0);
require_once "connect.php";
?>

<?php

if (isset($_POST['them'])) {
    $mavattu = $_POST['mavattu'];
    $tenvattu = $_POST['tenvattu'];
    $soluong = $_POST['soluong'];
    $donvitinh = $_POST['donvitinh'];
    $gia = $_POST['gia'];
    $ngaynhap = $_POST['ngaynhap'];
    $nhacungcap = $_POST['nhacungcap'];

    $queryCheck = mysqli_query($conn, "SELECT * FROM vattu WHERE mavattu = '$mavattu'");

    if ($mavattu == "") {
        $errmavattu = "Vui lòng nhập mã vật tư";
    }
    if ($tenvattu == "") {
        $errtenvattu = "Vui lòng nhập mã vật tư";
    }
    if ($soluong == "") {
        $errsoluong = "Vui lòng nhập mã vật tư";
    }
    if ($donvitinh == "") {
        $errdonvitinh = "Vui lòng nhập mã vật tư";
    }
    if ($gia == "") {
        $errgia = "Vui lòng nhập mã vật tư";
    }
    if ($ngaynhap == "") {
        $errngaynhap = "Vui lòng nhập mã vật tư";
    }
    if ($nhacungcap == "") {
        $errnhacungcap = "Vui lòng nhập mã vật tư";
    }

    if ($soluong < 0) {
        $checkSL = "Vui lòng nhập số lượng trên 0";
    }

    if ($mavattu != "" && $tenvattu != "" && $soluong != "" && $donvitinh != "" && $gia != "" && $ngaynhap != "" && $nhacungcap != "") {
        if (mysqli_num_rows($queryCheck) > 0) {
            $errCheck = "Mã này đã tồn tại, vui lòng nhập mã khác!";
        } else {
            $query = mysqli_query($conn, "INSERT INTO `vattu`(`mavattu`, `tenvattu`, `soluong`, `donvitinh`, `gia`, `ngaynhap`, `manhacungcap`) 
                VALUES ('$mavattu','$tenvattu','$soluong','$donvitinh','$gia','$ngaynhap','$nhacungcap')");
            header("location: index.php");
        }
    }
}

?>

<title>Thêm</title>
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
    <form action="" method="post">
        <div class="form-group">
            <label for="mavattu">Mã vật tư</label>
            <input type="text" name="mavattu" id="" placeholder="Nhập mã vật tư" value="<?php echo $mavattu; ?>">
            <span><?php echo $errCheck; ?></span>
            <span><?php echo $errmavattu; ?></span>
        </div>
        <div class="form-group">
            <label for="tenvattu">Tên vật tư</label>
            <input type="text" name="tenvattu" id="" placeholder="Nhập tên vật tư" value="<?php echo $tenvattu; ?>">
            <span><?php echo $errtenvattu; ?></span>
        </div>
        <div class="form-group">
            <label for="soluong">Số lượng</label>
            <input type="number" name="soluong" id="" placeholder="Nhập số lượng" value="<?php echo $soluong; ?>">
            <span><?php echo $errsoluong; ?></span>
            <span><?php echo $checkSL; ?></span>
        </div>
        <div class="form-group">
            <label for="donvitinh">Đơn vị tính</label>
            <input type="text" name="donvitinh" id="" placeholder="Nhập đơn vị tính" value="<?php echo $donvitinh; ?>">
            <span><?php echo $errdonvitinh; ?></span>
        </div>
        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="text" name="gia" id="" placeholder="Nhập Giá" min="0.0" value="<?php echo $gia; ?>">
            <span><?php echo $errgia; ?></span>
        </div>
        <div class="form-group">
            <label for="ngaynhap">Ngày nhập</label>
            <input type="date" name="ngaynhap" id="" placeholder="Chọn ngày nhập" value="<?php echo $ngaynhap; ?>">
            <span><?php echo $errngaynhap; ?></span>
        </div>
        <div class="form-group">
            <label for="nhacungcap">Nhà cung cấp</label>
            <select name="nhacungcap" id="">
                <option value="">-- Chọn nhà cung cấp --</option>
                <?php
                $queryNhaCungCap = mysqli_query($conn, "SELECT * FROM nhacungcap");

                if (mysqli_num_rows($queryNhaCungCap) > 0) {
                    while ($rowNhaCungCap = mysqli_fetch_assoc($queryNhaCungCap)) {
                        echo "<option value='{$rowNhaCungCap['manhacungcap']}'>{$rowNhaCungCap['tennhacungcap']}</option>";
                    }
                }
                ?>
            </select>
            <span><?php echo $errnhacungcap; ?></span>
        </div>
        <button type="submit" name="them" class="btn">Thêm</button>
    </form>
</div>
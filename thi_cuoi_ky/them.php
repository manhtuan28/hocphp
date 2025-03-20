<?php
error_reporting(0);
require_once "connect.php";
?>

<?php
if (isset($_POST['them'])) {
    $maGV = $_POST['maGV'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $khoa = $_POST['khoa'];

    $queryCheck = mysqli_query($conn, "SELECT * FROM giangvien");
    $rowCheck = mysqli_fetch_assoc($queryCheck);

    if ($maGV == "") {
        $errNhapMa = "Vui lòng nhập mã";
    }
    if ($hoTen == "") {
        $errHoTen = "Vui lòng nhập họ tên";
    }
    if ($ngaySinh == "") {
        $errNgaySinh = "Vui nhập ngày sinh";
    }
    if ($gioiTinh == "") {
        $errGioiTinh = "Vui chọn giới tính";
    }
    if ($khoa == "") {
        $errKhoa = "Vui lòng chọn khoa";
    }

    if ($maGV != "" && $hoTen != "" && $ngaySinh != "" && $ngaySinh != "" && $khoa != "") {
        if ($rowCheck['magv'] == $maGV) {
            $errCheckMa = "Trùng mã, vui lòng nhập lại";
        } else {
            $query = mysqli_query($conn, "INSERT INTO `giangvien`(`magv`, `hoten`, `ngaysinh`, `gioitinh`, `makhoa`) 
            VALUES ('$maGV','$hoTen','$ngaySinh','$gioiTinh','$khoa')");
            header("location: index.php");
        }
    }
}
?>

<title>Thêm dữ liệu</title>

<form action="" method="post">
    <table>
        <tr>
            <th>Mã giảng viên:</th>
            <td><input type="text" name="maGV" id=""></td>
            <td>
                <span><?php echo $errNhapMa; ?></span>
                <span><?php echo $errCheckMa; ?></span>
            </td>
        </tr>
        <tr>
            <th>Họ tên:</th>
            <td><input type="text" name="hoTen" id=""></td>
            <td>
                <span><?php echo $errHoTen; ?></span>
            </td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><input type="date" name="ngaySinh" id=""></td>
            <td>
                <span><?php echo $errNgaySinh; ?></span>
            </td>
        </tr>
        <tr>
            <th>Giới tính:</th>
            <td>
                <input type="radio" name="gioiTinh" id="nam" value="Nam">
                <label for="nam">Nam</label>
                <input type="radio" name="gioiTinh" id="nu" value="Nữ">
                <label for="nu">Nữ</label>
                <input type="radio" name="gioiTinh" id="khac" value="Khác">
                <label for="khac">Khác</label>
            </td>
            <td>
                <span><?php echo $errGioiTinh; ?></span>
            </td>
        </tr>
        <tr>
            <th>Khoa:</th>
            <td>
                <select name="khoa" id="">
                    <option value="">-- Chọn khoa --</option>
                    <?php
                    $queryKH = mysqli_query($conn, "SELECT * FROM khoa");

                    if (mysqli_num_rows($queryKH) > 0) {
                        while ($rowKH = mysqli_fetch_assoc($queryKH)) {
                            echo "<option value='{$rowKH['makhoa']}'>{$rowKH['tenkhoa']}</option>";
                        }
                    }
                    ?>
                </select>
            </td>
            <td>
                <span><?php echo $errKhoa; ?></span>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit" name="them">Thêm</button>
                <button type="reset">Hủy</button>
            </td>
        </tr>
    </table>
</form>
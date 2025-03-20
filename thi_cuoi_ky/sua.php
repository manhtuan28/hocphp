<?php
error_reporting(0);
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}

$queryHT = mysqli_query($conn, "SELECT * FROM giangvien WHERE magv = '$ma'");
$rowHT = mysqli_fetch_assoc($queryHT);

?>

<?php
if (isset($_POST['sua'])) {
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

    if ($maGV != "" && $hoTen != "" && $ngaySinh != "" && $gioiTinh != "" && $khoa != "") {
        if ($rowCheck['magv'] == $maGV) {
            $errCheckMa = "Trùng mã, vui lòng nhập lại";
        } else {
            $query = mysqli_query($conn, "UPDATE `giangvien` SET `magv`='$maGV',`hoten`='$hoTen',`ngaysinh`='$ngaySinh',`gioitinh`='$gioiTinh',`makhoa`='$khoa' WHERE magv = '$ma'");
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
            <td><input type="text" name="maGV" id="" value="<?php echo $rowHT['magv']; ?>"></td>
            <td>
                <span><?php echo $errNhapMa; ?></span>
                <span><?php echo $errCheckMa; ?></span>
            </td>
        </tr>
        <tr>
            <th>Họ tên:</th>
            <td><input type="text" name="hoTen" id="" value="<?php echo $rowHT['hoten']; ?>"></td>
            <td>
                <span><?php echo $errHoTen; ?></span>
            </td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><input type="date" name="ngaySinh" id="" value="<?php echo $rowHT['ngaysinh']; ?>"></td>
            <td>
                <span><?php echo $errNgaySinh; ?></span>
            </td>
        </tr>
        <tr>
            <th>Giới tính:</th>
            <td>
                <input type="radio" name="gioiTinh" id="nam" value="Nam" <?php if ($rowHT['gioitinh'] == "Nam") echo "checked"; ?>>
                <label for="nam">Nam</label>
                <input type="radio" name="gioiTinh" id="nu" value="Nữ" <?php if ($rowHT['gioitinh'] == "Nữ") echo "checked"; ?>>
                <label for="nu">Nữ</label>
                <input type="radio" name="gioiTinh" id="khac" value="Khác" <?php if ($rowHT['gioitinh'] == "Khác") echo "checked"; ?>>
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
                    <?php
                    $queryKH = mysqli_query($conn, "SELECT * FROM khoa");

                    if (mysqli_num_rows($queryKH) > 0) {
                        while ($rowKH = mysqli_fetch_assoc($queryKH)) {
                            if ($rowKH['makhoa'] == $rowHT['makhoa']) {
                                echo "<option value='{$rowKH['makhoa']}' selected>{$rowKH['tenkhoa']}</option>";
                            } else {
                                echo "<option value='{$rowKH['makhoa']}'>{$rowKH['tenkhoa']}</option>";
                            }
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
                <button type="submit" name="sua">Sửa</button>
                <button type="reset">Hủy</button>
            </td>
        </tr>
    </table>
</form>
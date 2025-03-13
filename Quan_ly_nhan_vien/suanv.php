<?php
error_reporting(0);
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}
?>

<?php
$query = mysqli_query($conn, "SELECT * FROM nhanvien WHERE manv = '$ma'");
$row = mysqli_fetch_assoc($query);
?>

<?php
if (isset($_POST['change'])) {
    $maNV = $_POST['maNV'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $heSoLuong = $_POST['heSoLuong'];
    $donVi = $_POST['donVi'];
    $chucVu = $_POST['chucVu'];

    if ($maNV == "") {
        $errMaNV = "Vui lòng nhập mã nhân viên!";
    }
    if ($hoTen == "") {
        $errHoTen = "Vui lòng nhập mã nhân viên!";
    }
    if ($ngaySinh == "") {
        $errNgaySinh = "Vui lòng chọn ngày sinh!";
    }
    if ($gioiTinh == "") {
        $errGioiTinh = "Vui lòng chọn giới tính!";
    }
    if ($heSoLuong == "") {
        $errHeSL = "Vui lòng nhập hệ số lương!";
    }
    if ($donVi == "") {
        $errDonVi = "Vui lòng chọn đơn vị!";
    }
    if ($chucVu == "") {
        $errChucVu = "Vui lòng chọn chức vụ!";
    }

    if ($maNV != "" && $hoTen != "" && $ngaySinh != "" && $gioiTinh != "" && $heSoLuong != "" && $donVi != "" && $chucVu != "") {
        $query = mysqli_query($conn, "UPDATE nhanvien SET manv = '$maNV', hoten = '$hoTen', ngaysinh = '$ngaySinh', gioitinh = '$gioiTinh', hsl = '$heSoLuong', madv_id = '$donVi', macv_id = '$chucVu' WHERE manv = '$ma'");
        header("location: index.php");
    }
}

if (isset($_POST['huy'])) {
    $maNV = "";
    $hoTen = "";
    $ngaySinh = "";
    $gioiTinh = "";
    $heSoLuong = "";
    $donVi = "";
    $chucVu = "";
}
?>

<title>Sửa nhân viên</title>
<style>
    table {
        text-align: left;
    }

    button {
        cursor: pointer;
    }
</style>
<form action="" method="post">
    <table align="center">
        <tr>
            <th>Mã nhân viên:</th>
            <td><input type="text" name="maNV" id="" value="<?php echo $row['manv']; ?>"></td>
            <td><span><?php echo $errMaNV; ?></span></td>
        </tr>
        <tr>
            <th>Họ tên:</th>
            <td><input type="text" name="hoTen" id="" value="<?php echo $row['hoten']; ?>"></td>
            <td><span><?php echo $errHoTen; ?></span></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><input type="date" name="ngaySinh" id="" value="<?php echo $row['ngaysinh']; ?>"></td>
            <td><span><?php echo $errNgaySinh; ?></span></td>
        </tr>
        <tr>
            <th>Giới tính:</th>
            <td>
                <input type="radio" name="gioiTinh" id="nam" value="Nam" <?php if ($row['gioitinh'] == "Nam") echo "checked"; ?>>
                <label for="nam">Nam</label>
                <input type="radio" name="gioiTinh" id="nu" value="Nữ" <?php if ($row['gioitinh'] == "Nữ") echo "checked"; ?>>
                <label for="nu">Nữ</label>
                <input type="radio" name="gioiTinh" id="khac" value="Khác" <?php if ($row['gioitinh'] == "Khác") echo "checked"; ?>>
                <label for="khac">Khác</label>
            </td>
            <td><span><?php echo $errGioiTinh; ?></span></td>
        </tr>
        <tr>
            <th>Hệ số lương:</th>
            <td><input type="text" name="heSoLuong" id="" value="<?php echo $row['hsl']; ?>"></td>
            <td><span><?php echo $errHeSL; ?></span></td>
        </tr>
        <tr>
            <th>Đơn vị:</th>
            <td>
                <select name="donVi" id="">
                    <?php
                    $queryDonVi = mysqli_query($conn, "SELECT * FROM donvi");

                    if (mysqli_num_rows($queryDonVi) > 0) {
                        while ($rowDonVi = mysqli_fetch_assoc($queryDonVi)) {
                            if ($rowDonVi['madv'] == $row['madv_id']) {
                                echo "<option value='{$rowDonVi['madv']}' selected>{$rowDonVi['tendv']}</option>";
                            } else {
                                echo "<option value='{$rowDonVi['madv']}'>{$rowDonVi['tendv']}</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </td>
            <td><span><?php echo $errDonVi; ?></span></td>
        </tr>
        <tr>
            <th>Chức vụ:</th>
            <td>
                <select name="chucVu" id="">
                    <?php
                    $queryChucVu = mysqli_query($conn, "SELECT * FROM chucvu");

                    if (mysqli_num_rows($queryChucVu) > 0) {
                        while ($rowChucvu = mysqli_fetch_assoc($queryChucVu)) {
                            if ($rowChucvu['macv'] == $row['macv_id']) {
                                echo "<option value='{$rowChucvu['macv']}' selected>{$rowChucvu['tencv']}</option>";
                            } else {
                                echo "<option value='{$rowChucvu['macv']}'>{$rowChucvu['tencv']}</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </td>
            <td><span><?php echo $errChucVu; ?></span></td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit" name="change">Sửa</button>
                <button type="submit" name="huy">Hủy</button>
            </td>
        </tr>
        <tr>
            <th></th>
            <td><a href="index.php">Quay lại trang chủ</a></td>
        </tr>
    </table>
</form>
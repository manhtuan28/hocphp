<?php
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}

$query = mysqli_query($conn, "SELECT * FROM nhanvien WHERE manv = '$ma'");
$row = mysqli_fetch_assoc($query);

?>

<?php
if (isset($_POST['sua'])) {
    $maNV = $_POST['maNV'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $hsl = $_POST['hsl'];
    $donVi = $_POST['donVi'];
    $chucVu = $_POST['chucVu'];

    $query = mysqli_query($conn, "UPDATE nhanvien SET manv = '$maNV', hoten = '$hoTen', ngaysinh = '$ngaySinh', gioitinh = '$gioiTinh', hsl = '$hsl', madv_id = '$donVi', macv_id = '$chucVu' WHERE manv = '$ma'");
    header("location: index.php");
}

if (isset($_POST['huy'])) {
    $maNV = "";
    $hoTen = "";
    $ngaySinh = "";
    $gioiTinh = "";
    $hsl = "";
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
        </tr>
        <tr>
            <th>Họ tên:</th>
            <td><input type="text" name="hoTen" id="" value="<?php echo $row['hoten']; ?>"></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><input type="date" name="ngaySinh" id="" value="<?php echo $row['ngaysinh']; ?>"></td>
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
        </tr>
        <tr>
            <th>Hệ số lương</th>
            <td><input type="text" name="hsl" id="" value="<?php echo $row['hsl']; ?>"></td>
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
        </tr>
        <tr>
            <th>Chức vụ:</th>
            <td>
                <select name="chucVu" id="">
                    <?php
                    $queryChucVu = mysqli_query($conn, "SELECT * FROM chucvu");

                    if (mysqli_num_rows($queryChucVu) > 0) {
                        while ($rowChucVu = mysqli_fetch_assoc($queryChucVu)) {
                            if ($rowChucVu['macv'] == $row['macv_id']) {
                                echo "<option value='{$rowChucVu['macv']}' selected>{$rowChucVu['tencv']}</option>";
                            } else {
                                echo "<option value='{$rowChucVu['macv']}'>{$rowChucVu['tencv']}</option>";
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
                <button type="submit" name="sua">Sửa</button>
                <button type="submit" name="huy">Hủy</button>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <a href="index.php">Quay lại trang chủ</a>
            </td>
        </tr>
    </table>
</form>
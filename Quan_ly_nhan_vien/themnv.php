<?php
error_reporting(0);
require_once "connect.php";
?>

<?php
if (isset($_POST['add'])) {
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
        $query = mysqli_query($conn, "INSERT INTO nhanvien(manv, hoten, ngaysinh, gioitinh, hsl, madv_id, macv_id) VALUES('$maNV', '$hoTen', '$ngaySinh', '$gioiTinh', '$heSoLuong', '$donVi', '$chucVu')");
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

<title>Thêm nhân viên</title>
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
            <td><input type="text" name="maNV" id=""></td>
            <td><span><?php echo $errMaNV; ?></span></td>
        </tr>
        <tr>
            <th>Họ tên:</th>
            <td><input type="text" name="hoTen" id=""></td>
            <td><span><?php echo $errHoTen; ?></span></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><input type="date" name="ngaySinh" id=""></td>
            <td><span><?php echo $errNgaySinh; ?></span></td>
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
            <td><span><?php echo $errGioiTinh; ?></span></td>
        </tr>
        <tr>
            <th>Hệ số lương:</th>
            <td><input type="text" name="heSoLuong" id=""></td>
            <td><span><?php echo $errHeSL; ?></span></td>
        </tr>
        <tr>
            <th>Đơn vị:</th>
            <td>
                <select name="donVi" id="">
                    <option value="">-- Chọn Đơn Vị --</option>
                    <?php
                    $queryDonVi = mysqli_query($conn, "SELECT * FROM donvi");

                    if (mysqli_num_rows($queryDonVi) > 0) {
                        while ($rowDonVi = mysqli_fetch_assoc($queryDonVi)) {
                            echo "<option value='{$rowDonVi['madv']}'>{$rowDonVi['tendv']}</option>";
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
                    <option value="">-- Chọn Chức Vụ --</option>
                    <?php
                    $queryChucVu = mysqli_query($conn, "SELECT * FROM chucvu");

                    if (mysqli_num_rows($queryChucVu) > 0) {
                        while ($rowChucVu = mysqli_fetch_assoc($queryChucVu)) {
                            echo "<option value='{$rowChucVu['macv']}'>{$rowChucVu['tencv']}</option>";
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
                <button type="submit" name="add">Thêm</button>
                <button type="submit" name="huy">Hủy</button>
            </td>
        </tr>
        <tr>
            <th></th>
            <td><a href="index.php">Quay lại trang chủ</a></td>
        </tr>
    </table>
</form>
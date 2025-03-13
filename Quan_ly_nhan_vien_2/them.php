<?php
require_once "connect.php";
?>

<?php
if (isset($_POST['them'])) {
    $maNV = $_POST['maNV'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $hsl = $_POST['hsl'];
    $donVi = $_POST['donVi'];
    $chucVu = $_POST['chucVu'];

    $query = mysqli_query($conn, "INSERT INTO nhanvien(manv, hoten, ngaysinh, gioitinh, hsl, madv_id, macv_id) VALUES('$maNV', '$hoTen', '$ngaySinh', '$gioiTinh', '$hsl', '$donVi', '$chucVu')");
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
        </tr>
        <tr>
            <th>Họ tên:</th>
            <td><input type="text" name="hoTen" id=""></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><input type="date" name="ngaySinh" id=""></td>
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
        </tr>
        <tr>
            <th>Hệ số lương</th>
            <td><input type="text" name="hsl" id=""></td>
        </tr>
        <tr>
            <th>Đơn vị:</th>
            <td>
                <select name="donVi" id="">
                    <option value="">-- Chọn đơn vị --</option>
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
        </tr>
        <tr>
            <th>Chức vụ:</th>
            <td>
                <select name="chucVu" id="">
                    <option value="">-- Chọn chức vụ --</option>
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
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit" name="them">Thêm</button>
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
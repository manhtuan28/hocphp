<?php
require_once "connect.php";
?>

<?php
if (isset($_POST['add'])) {
    $maSo = $_POST['maSo'];
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $viTri = $_POST['viTri'];
    $clb = $_POST['clb'];

    $query = mysqli_query($conn, "INSERT INTO thongtincauthu(maSo, hoTen, ngaySinh, viTri, maCLB_ID) VALUES('$maSo', '$hoTen', '$ngaySinh', '$viTri', '$clb')");
    header("location: index.php");
}
?>

<title>Thêm dữ liệu</title>
<style>
    table {
        text-align: left;
    }
</style>
<form action="" method="post">
    <table align="center">
        <tr>
            <th>Mã số:</th>
            <td><input type="text" name="maSo" id=""></td>
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
            <th>Vị trí:</th>
            <td><input type="text" name="viTri" id=""></td>
        </tr>
        <tr>
            <th>Câu lạc bộ:</th>
            <td>
                <select name="clb" id="">
                    <option value="">-- Chọn câu lạc bộ --</option>
                    <?php
                    $queryCLB = mysqli_query($conn, "SELECT * FROM caulacbo");

                    if (mysqli_num_rows($queryCLB) > 0) {
                        while ($rowCLB = mysqli_fetch_assoc($queryCLB)) {
                            echo "<option value='{$rowCLB['maCLB']}'>{$rowCLB['tenCLB']}</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit" name="add">Thêm</button>
                <button type="reset" name="huy">Hủy</button>
            </td>
        </tr>
        <tr>
            <th></th>
            <td><a href="index.php">Quay lại trang chủ</a></td>
        </tr>
    </table>
</form>
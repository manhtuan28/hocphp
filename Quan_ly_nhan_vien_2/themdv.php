<?php
require_once "connect.php";
?>

<?php
if (isset($_POST['them'])) {
    $maDV = $_POST['maDV'];
    $tenDV = $_POST['tenDV'];
    $soNV = $_POST['soNV'];
    $cbpt = $_POST['cbpt'];

    $query = mysqli_query($conn, "INSERT INTO donvi(madv, tendv, sonv, cbpt) VALUES('$maDV', '$tenDV', '$soNV', '$cbpt')");
    header("location: index.php");
}

if (isset($_POST['huy'])) {
    $maDV = "";
    $tenDV = "";
    $soNV = "";
    $cbpt = "";
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
            <th>Mã đơn vị:</th>
            <td><input type="text" name="maDV" id=""></td>
        </tr>
        <tr>
            <th>Tên đơn vị:</th>
            <td><input type="text" name="tenDV" id=""></td>
        </tr>
        <tr>
            <th>Số nhân viên:</th>
            <td><input type="number" name="soNV" id=""></td>
        </tr>
        <tr>
            <th>Cán bộ phụ trách:</th>
            <td><input type="text" name="cbpt" id=""></td>
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
            <td><a href="index.php">Quay lại trang chủ</a></td>
        </tr>
    </table>
</form>
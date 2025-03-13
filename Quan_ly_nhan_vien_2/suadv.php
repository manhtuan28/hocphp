<?php
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}
?>

<?php
$querySL = mysqli_query($conn, "SELECT * FROM donvi WHERE madv = '$ma'");
$row = mysqli_fetch_assoc($querySL);

if (isset($_POST['sua'])) {
    $maDV = $_POST['maDV'];
    $tenDV = $_POST['tenDV'];
    $soNV = $_POST['soNV'];
    $cbpt = $_POST['cbpt'];

    $query = mysqli_query($conn, "UPDATE donvi SET madv = '$maDV', tendv = '$tenDV', soNV = '$soNV', cbpt = '$cbpt' WHERE madv = '$ma'");
    header("location: index.php");
}

if (isset($_POST['huy'])) {
    $maDV = "";
    $tenDV = "";
    $soNV = "";
    $cbpt = "";
}
?>

<title>Sửa dữ liệu</title>
<style>
    table {
        text-align: left;
    }
</style>
<form action="" method="post">
    <table align="center">
        <tr>
            <th>Mã đơn vị:</th>
            <td><input type="text" name="maDV" id="" value="<?php echo $row['madv']; ?>"></td>
        </tr>
        <tr>
            <th>Tên đơn vị:</th>
            <td><input type="text" name="tenDV" id="" value="<?php echo $row['tendv']; ?>"></td>
        </tr>
        <tr>
            <th>Số nhân viên:</th>
            <td><input type="number" name="soNV" id="" value="<?php echo $row['sonv']; ?>"></td>
        </tr>
        <tr>
            <th>Cán bộ phụ trách:</th>
            <td><input type="text" name="cbpt" id="" value="<?php echo $row['cbpt']; ?>"></td>
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
            <td><a href="index.php">Quay lại trang chủ</a></td>
        </tr>
    </table>
</form>
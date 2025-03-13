<?php
error_reporting(0);
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}

?>

<?php
$query = mysqli_query($conn, "SELECT * FROM donvi WHERE madv = '$ma'");

$row = mysqli_fetch_assoc($query);
?>

<?php
if (isset($_POST['save'])) {
    $maDV = $_POST['maDV'];
    $tenDV = $_POST['tenDV'];
    $soNV = $_POST['soNV'];
    $canBoPT = $_POST['canBoPT'];


    if ($maDV == "") {
        $errMaDV = "Vui lòng nhập mã đơn vị";
    }
    if ($tenDV == "") {
        $errTenDV = "Vui lòng nhập tên đơn vij";
    }
    if ($soNV == "") {
        $errSoNV = "Vui lòng nhập số nhân viên";
    }
    if ($canBoPT == "") {
        $errCanBoPT = "Vui lòng nhập cán bộ phụ trách";
    }

    if ($maDV != "" && $tenDV != "" && $soNV != "" && $canBoPT != "") {
        $query = mysqli_query($conn, "UPDATE donvi SET madv = '$maDV', tendv = '$tenDV', sonv = '$soNV', cbpt = '$canBoPT' WHERE madv = '$ma'");
        header("location: index.php");
    }
}

if (isset($_POST['huy'])) {
    $maDV = "";
    $tenDV = "";
    $soNV = "";
    $canBoPT = "";
}
?>

<title>Sửa dữ liệu</title>
<style>
    table {
        text-align: left;
    }

    button {
        cursor: pointer;
    }

    input[readonly] {
        background-color: #ccc;
    }
</style>
<form action="" method="post">
    <table align="center">
        <tr>
            <th>Mã đơn vị:</th>
            <td><input type="text" name="maDV" id="" value="<?php echo $row['madv']; ?>" readonly></td>
            <td><span><?php echo $errMaDV; ?></span></td>
        </tr>
        <tr>
            <th>Tên đơn vị:</th>
            <td><input type="text" name="tenDV" id="" value="<?php echo $row['tendv']; ?>"></td>
            <td><span><?php echo $errTenDV; ?></span></td>
        </tr>
        <tr>
            <th>Số nhân viên:</th>
            <td><input type="number" name="soNV" id="" value="<?php echo $row['sonv']; ?>"></td>
            <td><span><?php echo $errSoNV; ?></span></td>
        </tr>
        <tr>
            <th>Cán bộ phụ trách:</th>
            <td><input type="text" name="canBoPT" id="" value="<?php echo $row['cbpt']; ?>"></td>
            <td><span><?php echo $errCanBoPT; ?></span></td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit" name="save">Lưu</button>
                <button type="submit" name="huy">Hủy</button>
            </td>
        </tr>
        <tr>
            <th></th>
            <td><a href="index.php">Quay lại trang chủ</a></td>
        </tr>
    </table>
</form>
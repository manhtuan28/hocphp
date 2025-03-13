<?php
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}
?>

<?php
$check = mysqli_query($conn, "SELECT * FROM nhanvien WHERE madv_id = '$ma'");

if (mysqli_num_rows($check) > 0) {
    echo "Không thể xóa! Vẫn còn nhân viên trong đơn vị này.<br><a href='index.php'>Quay lại trang chủ</a>";
} else {

    $query = mysqli_query($conn, "DELETE FROM donvi WHERE madv = '$ma'");
    header("location: index.php");
}

?>
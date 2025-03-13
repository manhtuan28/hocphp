<?php
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}
?>

<?php
$query = mysqli_query($conn, "DELETE FROM nhanvien WHERE manv = '$ma'");
header("location: index.php");
?>
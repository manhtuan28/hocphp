<?php
error_reporting(0);
require_once "connect.php";

if (isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}
?>

<?php
$query = mysqli_query($conn, "DELETE FROM `lop` WHERE malop = '$ma'");
header("location: index.php");
?>
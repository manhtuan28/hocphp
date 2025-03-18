<?php
require_once "connect.php";

if(isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}

$query = mysqli_query($conn, "DELETE FROM thongtincauthu WHERE maSo = '$ma'");
header("location: index.php");
?>
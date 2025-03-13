<?php
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "DELETE FROM bai_hat WHERE id = $id";
$query = mysqli_query($conn, $sql);
header("Location: index.php");
?>
<?php
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>

<?php
$sql = "DELETE FROM phim WHERE id = $id";
$query = mysqli_query($conn, $sql);
header("location: index.php");
?>
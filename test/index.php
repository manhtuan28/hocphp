<?php
error_reporting(0);
require_once "connect.php";

$limit = 5;

if($_GET['page']) {
    $pageStart = $_GET['page'];

    if($pageStart < 1) {
        $pageStart = 1;
    }
} else {
    $pageStart = 1;
}

$start = ($pageStart - 1 ) * $limit;

$querySum = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM sach");
$rowSum = mysqli_fetch_assoc($querySum);
$sumSach = $rowSum['tong'];
$sumPage = ceil($sumSach / $limit);

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị dữ liệu</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>DANH SÁCH SÁCH</h1>
            <a href="them.php" class="btn btn-add">Thêm sách</a>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Năm xuất bản</th>
                <th>Thể loại</th>
                <th>Tên đầu sách</th>
                <th>Tác vụ</th>
            </tr>
            <?php
                $stt = $start + 1;
                $query = mysqli_query($conn, "SELECT s.masach, s.tensach, s.tacgia, s.namxuatban, s.theloai, ds.tends FROM sach s
                    JOIN dau_sach ds ON s.mads = ds.mads ORDER BY s.masach ASC LIMIT $limit OFFSET $start");

                if(mysqli_num_rows($query) > 0) {
                    while($row = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $stt++; ?></td>
                <td><?php echo $row['masach']; ?></td>
                <td><?php echo $row['tensach']; ?></td>
                <td><?php echo $row['tacgia']; ?></td>
                <td><?php echo $row['namxuatban']; ?></td>
                <td><?php echo $row['theloai']; ?></td>
                <td><?php echo $row['tends']; ?></td>
                <td>
                    <a href="sua.php?ma=<?php echo $row['masach']; ?>" class="btn btn-edit">Sửa</a>
                    <a href="xoa.php?ma=<?php echo $row['masach']; ?>"
                        onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-delete">Xóa</a>
                </td>
            </tr>
            <?php }}else {
                echo "<tr><td colspan='8'>Không có dữ liệu</td></tr>";
            }?>
        </table>
        <div class="phanTrang">
            <?php
                if($pageStart > 1) {
            ?>
            <a href="?page=<?php echo $pageStart - 1; ?>" class="page-btn">Trang trước</a>
            <?php }?>

            <?php
                for($i = 1; $i <= $sumPage; $i++) {
                $activeClass = ($i == $pageStart) ? 'active' : '';
            ?>
            <a href="?page=<?php echo $i; ?>" class="<?php echo $activeClass; ?> page-btn">
                <?php echo $i; ?>
            </a>
            <?php }?>

            <?php
                if($pageStart < $sumPage) {
            ?>
            <a href="?page=<?php echo $pageStart + 1; ?>" class="page-btn">Trang sau</a>
            <?php }?>
        </div>
    </div>
</body>

</html>
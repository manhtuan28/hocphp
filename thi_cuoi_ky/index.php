<?php
require_once "connect.php";
?>
<?php
$limit = 5;

if (isset($_GET['page'])) {
    $pageStart = $_GET['page'];

    if ($pageStart < 1) {
        $pageStart = 1;
    }
} else {
    $pageStart = 1;
}

$start = ($pageStart - 1) * $limit;

$querySum = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM giangvien");
$rowSum = mysqli_fetch_assoc($querySum);
$sumGV = $rowSum['tong'];
$sumPage = ceil($sumGV / $limit);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị</title>
</head>
<style>
    table {
        text-align: center;
    }

    .phanTrang {
        text-align: center;
        padding-top: 6px;
    }

    .phanTrang a {
        text-decoration: none;
        font-size: 22px;
        padding: 12px;
    }

    .phanTrang a.active {
        font-weight: bold;
        color: red;
    }
</style>

<body>
    <table border="1" align="center" cellpadding="12" cellspacing="0" width="100%">
        <tr>
            <th colspan="6">DANH SÁCH GIẢNG VIÊN</th>
            <th><a href="them.php">Thêm</a></th>
        </tr>
        <tr>
            <th>STT</th>
            <th>Mã giáo viên</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Khoa</th>
            <th>Tác vụ</th>
        </tr>
        <?php
        $stt = $start + 1;
        $query = mysqli_query($conn, "SELECT gv.magv, gv.hoten, gv.ngaysinh, gv.gioitinh, k.tenkhoa FROM giangvien gv
                JOIN khoa k ON gv.makhoa = k.makhoa ORDER BY gv.magv ASC LIMIT $limit OFFSET $start");

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $bgcolor = ($stt % 2 == 0) ? '#ccc' : '#fff';
        ?>
                <tr style="background-color: <?php echo $bgcolor; ?>;">
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $row['magv']; ?></td>
                    <td><?php echo $row['hoten']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row['ngaysinh'])); ?></td>
                    <td><?php echo $row['gioitinh']; ?></td>
                    <td><?php echo $row['tenkhoa']; ?></td>
                    <td><a href="sua.php?ma=<?php echo $row['magv']; ?>">Sửa</a> | <a href="xoa.php?ma=<?php echo $row['magv']; ?>" onclick="return xacNhan()">Xóa</a></td>
                </tr>
        <?php }
        } else {
            echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
        } ?>
    </table>
    <div class="phanTrang">
        <?php
        if ($pageStart > 1) {
        ?>
            <a href="?page=<?php echo $pageStart - 1 ?>"> Trang sau </a>
        <?php } ?>

        <?php
        for ($i = 1; $i <= $sumPage; $i++) {
            $activeClass = ($i == $pageStart) ? 'active' : '';
        ?>
            <a href="?page=<?php echo $i; ?>" class="<?php echo $activeClass; ?>">
                <?php echo $i; ?>
            </a>
        <?php } ?>

        <?php
        if ($pageStart < $sumPage) {
        ?>
            <a href="?page=<?php echo $pageStart + 1 ?>"> Trang trước </a>
        <?php } ?>
    </div>
    <script>
        function xacNhan() {
            return confirm("Bạn chắc chắn muốn xóa?");
        }
    </script>
</body>

</html>
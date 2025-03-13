<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>

<body>
    <table border="1" align="center">
        <tr>
            <th>Tên phim</th>
            <th>Năm phát hành</th>
            <th>Thời lượng</th>
            <th>Thể loại</th>
            <th>Đạo diễn</th>
            <th>Mô tả</th>
            <th><a href="them.php">Thêm</a></th>
        </tr>
        <?php
        $sql = "SELECT p.id, p.ten_phim, p.nam_phat_hanh, p.thoi_luong, tl.ten_the_loai, dd.ten_dao_dien, p.mo_ta FROM phim p
                JOIN the_loai tl ON p.the_loai_id = tl.id
                JOIN dao_dien dd ON p.dao_dien_id = dd.id";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {

        ?>
                <tr>
                    <td><?php echo $row['ten_phim']; ?></td>
                    <td><?php echo $row['nam_phat_hanh']; ?></td>
                    <td><?php echo $row['thoi_luong'] . " Phút"; ?></td>
                    <td><?php echo $row['ten_the_loai']; ?></td>
                    <td><?php echo $row['ten_dao_dien']; ?></td>
                    <td><?php echo $row['mo_ta']; ?></td>
                    <td><a href="sua.php?id=<?php echo $row['id']; ?>">Sửa</a> | <a href="xoa.php?id=<?php echo $row['id']; ?>" onclick="return xacNhan()">Xóa</a></td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td>Không có dữ liệu!</td></tr>";
        } ?>
    </table>

    <script>
        function xacNhan() {
            return confirm("Bạn có chắc chắn muốn xóa?");
        }
    </script>
</body>

</html>
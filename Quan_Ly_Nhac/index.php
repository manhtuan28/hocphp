<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<style>
    table {
        width: 100%;
        height: 200px;
    }
    td {
        text-align: center;
    }
</style>
<body>
    <table border="1" align="center">
        <tr>
            <th>Tên bài hát</th>
            <th>Album</th>
            <th>Thể loại</th>
            <th>Nghệ sĩ</th>
            <th>Thời lượng</th>
            <th>Ngày phát hành</th>
            <th><a href="them.php">Thêm</a></th>
        </tr>
        <?php
        $sql = "SELECT bh.id, bh.ten_bai_hat, ab.ten_album, tl.ten_the_loai, ns.ten_nghe_si, bh.thoi_luong, bh.ngay_phat_hanh FROM bai_hat bh
                JOIN album ab ON bh.album_id = ab.id
                JOIN the_loai tl ON bh.the_loai_id = tl.id
                JOIN nghe_si ns ON bh.nghe_si_id = ns.id";
        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?php echo $row['ten_bai_hat']; ?></td>
            <td><?php echo $row['ten_album']; ?></td>
            <td><?php echo $row['ten_the_loai']; ?></td>
            <td><?php echo $row['ten_nghe_si']; ?></td>
            <td><?php echo $row['thoi_luong']." giây"; ?></td>
            <td><?php echo $row['ngay_phat_hanh']; ?></td>
            <td><a href="sua.php?id=<?php echo $row['id']; ?>">Sửa</a> | <a href="xoa.php?id=<?php echo $row['id']; ?>" onclick="return xacNhan()">Xóa</a></td>
        </tr>
        <?php                 
            }
        } else {echo "<tr><td colspan='7'>Không có dữ liệu!</td></tr>";}?>
    </table>

    <script>
        function xacNhan() {
            return confirm("Bạn có chắn chắn muốn xóa?");
        }
    </script>
</body>

</html>
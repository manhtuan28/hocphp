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
        margin-bottom: 20px;
    }

    td {
        padding: 12px;
        text-align: center;
    }
</style>

<body>
    <table border="1" align="center" cellspacing="0">
        <tr>
            <th colspan="5">DANH SÁCH ĐƠN VỊ</th>
            <td style="font-size: 20px;"><a href="them.php">Thêm đơn vị</a></td>
        </tr>
        <tr>
            <th>STT</th>
            <th>Mã đơn vị</th>
            <th>Tên đơn vị</th>
            <th>Số nhân viên</th>
            <th>Cán bộ phụ trách</th>
            <th>Tác vụ</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM donvi");

        if (mysqli_num_rows($query) > 0) {
            $stt = 1;
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $row['madv']; ?></td>
                    <td><?php echo $row['tendv']; ?></td>
                    <td><?php echo $row['sonv']; ?></td>
                    <td><?php echo $row['cbpt']; ?></td>
                    <td><a href="sua.php?ma=<?php echo $row['madv']; ?>">Sửa</a> | <a href="xoa.php?ma=<?php echo $row['madv']; ?>" onclick="return xacNhan()">Xóa</a></td>
                </tr>
        <?php }
        } else {
            echo "<tr><td>Không có dữ liệu!</td></tr>";
        } ?>
    </table>

    <table border="1" align="center">
        <tr>
            <th colspan="8">DANH SÁCH NHÂN VIÊN</th>
            <td style="font-size: 20px;"><a href="themnv.php">Thêm nhân viên</a></td>
        </tr>
        <tr>
            <th>STT</th>
            <th>Mã nhân viên</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Hệ số lương</th>
            <th>Đơn vị</th>
            <th>Chức vụ</th>
            <th>Tác vụ</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT nv.manv, nv.hoten, nv.ngaysinh, nv.gioitinh, nv.hsl, dv.tendv, cv.tencv FROM nhanvien nv
                JOIN donvi dv ON nv.madv_id = dv.madv
                JOIN chucvu cv ON nv.macv_id = cv.macv");

        if (mysqli_num_rows($query) > 0) {
            $stt = 1;
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $row['manv']; ?></td>
                    <td><?php echo $row['hoten']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row['ngaysinh'])); ?></td>
                    <td><?php echo $row['gioitinh']; ?></td>
                    <td><?php echo $row['hsl']; ?></td>
                    <td><?php echo $row['tendv']; ?></td>
                    <td><?php echo $row['tencv']; ?></td>
                    <td><a href="suanv.php?ma=<?php echo $row['manv']; ?>">Sửa</a> | <a href="xoanv.php?ma=<?php echo $row['manv']; ?>" onclick="return xacNhan()">Xóa</a></td>
                </tr>
        <?php }
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

<!-- 
CASCADE
RESTRICT
SET NULL
NO ACTION
-->
<?php
require_once "connect.php";
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
        width: 100%;
        margin-bottom: 20px;
    }

    th {
        font-size: 18px;
    }

    td {
        padding: 10px;
        text-align: center;
    }
</style>

<body>

    <table border="1" align="center" cellpadding="12" cellspacing="0">
        <tr>
            <th colspan="5">DANH SÁCH ĐƠN VỊ</th>
            <th><a href="themdv.php">Thêm đơn vị</a></th>
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
        $stt = 1;
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $row['madv']; ?></td>
                    <td><?php echo $row['tendv']; ?></td>
                    <td><?php echo $row['sonv']; ?></td>
                    <td><?php echo $row['cbpt']; ?></td>
                    <td><a href="suadv.php?ma=<?php echo $row['madv']; ?>">Sửa</a> | <a href="xoadv.php?ma=<?php echo $row['madv']; ?>" onclick="return xacNhan()">Xóa</a></td>
                </tr>
        <?php }
        } else {
            echo "<tr><td>Không có dữ liệu!</td></tr>";
        } ?>
    </table>

    <table border="1" align="center" cellpadding="12" cellspacing ="0">
        <tr>
            <th colspan="8">DANH SÁCH NHÂN VIÊN</th>
            <th><a href="them.php">Thêm nhân viên</a></th>
        </tr>
        <tr>
            <th>STT</th>
            <th>Mã nhân viên</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới tính</th>
            <th>Hệ số lương</th>
            <th>Đơn vị</th>
            <th>Chức vụ</th>
            <th>Tác vụ</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT nv.manv, nv.hoten, nv.ngaysinh, nv.gioitinh, nv.hsl, dv.tendv, cv.tencv FROM nhanvien nv
                JOIN donvi dv ON nv.madv_id = dv.madv
                JOIN chucvu cv ON nv.macv_id = cv.macv ORDER BY nv.manv ASC");
        $stt = 1;
        if (mysqli_num_rows($query) > 0) {
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
                    <td><a href="sua.php?ma=<?php echo $row['manv']; ?>">Sửa</a> | <a href="xoa.php?ma=<?php echo $row['manv']; ?>" onclick="return xacNhan()">Xóa</a></td>
                </tr>
        <?php }
        } else {
            echo "<tr><td colspan='8'>Không có dữ kiệu!</td></tr>";
        } ?>
    </table>

    <script>
        function xacNhan() {
            return confirm("Bạn có chắc chắn muốn xóa?");
        }
    </script>
</body>

</html>
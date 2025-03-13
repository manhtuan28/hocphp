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
    }

    th {
        font-size: 20px;
    }

    td {
        text-align: center;
    }
</style>

<body>
    <table border="1" align="center" cellpadding="12" cellspacing="0">
        <tr>
            <th colspan="6">DANH SÁCH CẦU THỦ</th>
            <th><a href="them.php">Thêm cầu thủ</a></th>
        </tr>
        <tr>
            <th>STT</th>
            <th>Mã số</th>
            <th>Họ tên cầu thủ</th>
            <th>Ngày sinh</th>
            <th>Vị trí</th>
            <th>Câu lạc bộ</th>
            <th>Tác vụ</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT tt.maSo, tt.hoTen, tt.ngaySinh, tt.viTri, clb.tenCLB FROM thongtincauthu tt
                JOIN caulacbo clb ON tt.maCLB_ID = clb.maCLB");
        $stt = 1;
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
        ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo $row['maSo']; ?></td>
                    <td><?php echo $row['hoTen']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row['ngaySinh'])); ?></td>
                    <td><?php echo $row['viTri']; ?></td>
                    <td><?php echo $row['tenCLB']; ?></td>
                    <td>Sửa | Xóa</td>
                </tr>
        <?php }
        } else {
            echo "<tr><td colspan='6'>Không có dữ liệu!</td></tr>";
        } ?>
    </table>
</body>

</html>
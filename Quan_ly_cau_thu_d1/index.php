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
    body {
        display: grid;
        place-items: center;
    }

    a {
        width: 100%;
        text-decoration: none;
        color: #fff;
    }

    table {
        margin: 20px;
    }

    .them-moi {
        width: 120px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border-radius: 10px;
        box-shadow: 1px 2px 1px 2px;
        background-color: #18a2b7;
        font-size: 18px;
    }

    .tac-vu {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .sua,
    .xoa {
        width: 50px;
        height: 25px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
    }

    .sua {
        background-color: rgb(197, 197, 8);

    }

    .xoa {
        background-color: red;
    }

    .tt {
        font-size: 20px;
        text-transform: uppercase;
    }

    td {
        text-align: center;
        font-size: 19px;
    }
</style>

<body>
    <table border="1" align="center" cellpadding="12" cellspacing="0" width="100%">
        <tr>
            <th colspan="7" style="font-size: 28px; background-color: rgb(36, 124, 201); color: #fff;">DANH SÁCH CẦU THỦ</th>
        </tr>
        <tr>
            <th class="tt">STT</th>
            <th class="tt">Mã số</th>
            <th class="tt">Họ tên</th>
            <th class="tt">Ngày sinh</th>
            <th class="tt">Vị trí</th>
            <th class="tt">Câu lạc bộ</th>
            <th class="tt">Tác vụ</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT ttct.maSo, ttct.hoTen, ttct.ngaySinh, ttct.viTri, clb.tenCLB FROM thongtincauthu ttct
                JOIN caulacbo clb ON ttct.CLB_ID = clb.maCLB ORDER BY ttct.maSo ASC");
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
                    <td class="tac-vu">
                        <div class="sua">
                            <a href="sua.php?ma=<?php echo $row['maSo']; ?>">Sửa</a>
                        </div>
                        <div class="xoa">
                            <a href="xoa.php?ma=<?php echo $row['maSo']; ?>" onclick="return xacNhan()">Xóa</a>
                        </div>
                    </td>
                </tr>
        <?php }
        } else {
            echo "<tr><td colspan='7'>Không có dữ liệu!</td></tr>";
        } ?>
    </table>
    <div class="them-moi">
        <a href="them.php">Thêm cầu thủ</a>
    </div>

    <script>
        function xacNhan() {
            return confirm("Bạn chắc chắn muốn xóa?");
        }
    </script>
</body>

</html>
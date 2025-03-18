<?php
require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Cầu Thủ</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            margin: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            transition: 0.3s;
            border: none;
        }

        .btn-them {
            background-color: #28a745;
        }

        .btn-them:hover {
            background-color: #218838;
        }

        .btn-sua {
            background-color: #ffc107;
            color: black;
        }

        .btn-sua:hover {
            background-color: #e0a800;
        }

        .btn-xoa {
            background-color: #dc3545;
        }

        .btn-xoa:hover {
            background-color: #c82333;
        }

        .btn-container {
            text-align: right;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .action-buttons {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Quản Lý Cầu Thủ</h2>

        <div class="btn-container">
            <a href="them.php" class="btn btn-them">➕ Thêm Mới</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã cầu thủ</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Vị trí</th>
                    <th>Câu lạc bộ</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                $query = mysqli_query($conn, "SELECT ttct.maSo, ttct.hoTen, ttct.ngaySinh, ttct.viTri, clb.tenCLB FROM thongtincauthu ttct
                    JOIN caulacbo clb ON ttct.CLB_ID = clb.maCLB ORDER BY ttct.maSo ASC");
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
                            <td class="action-buttons">
                                <a href="sua.php?ma=<?php echo $row['maSo']; ?>" class="btn btn-sua">✏️ Sửa</a>
                                <a href="xoa.php?ma=<?php echo $row['maSo']; ?>" class="btn btn-xoa" onclick="return xacNhan()">❌ Xóa</a>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
                } ?>
            </tbody>
        </table>
    </div>
<script>
    function xacNhan() {
        return confirm("Bạn có muốn xóa?");
    }
</script>
</body>

</html>
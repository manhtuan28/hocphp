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
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 20px 30px;
        width: 80%;
        max-width: 1100px;
    }

    h1 {
        margin-bottom: 20px;
        text-align: center;
        color: #333;
        font-size: 26px;
        letter-spacing: 1px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: rgb(236, 234, 234);
    }

    tr:hover {
        background-color: #e2e2e2;
        transition: background-color 0.3s;
    }

    .btn {
        text-decoration: none;
        padding: 8px 15px;
        margin: 5px;
        border-radius: 6px;
        color: white;
        font-weight: bold;
        display: inline-block;
        transition: 0.3s;
        cursor: pointer;
    }

    .btn-add {
        background-color: #28a745;
    }

    .btn-edit {
        background-color: #f0ad4e;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .btn:hover {
        opacity: 0.85;
        transform: scale(1.05);
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <h1>DANH SÁCH VẬT TƯ</h1>
            <a href="them.php" class="btn btn-add">Thêm</a>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Mã vật tự</th>
                <th>Tên vật tư</th>
                <th>Số lượng</th>
                <th>Đơn vị tính</th>
                <th>Giá</th>
                <th>Ngày nhập</th>
                <th>Tên nhà cung cấp</th>
                <th>Tác vụ</th>
            </tr>
            <?php
            $stt = 1;
            $query = mysqli_query($conn, "SELECT vt.mavattu, vt.tenvattu, vt.soluong, vt.donvitinh, vt.gia, vt.ngaynhap, ncc.tennhacungcap FROM vattu vt
                JOIN nhacungcap ncc ON vt.manhacungcap = ncc.manhacungcap ORDER BY vt.mavattu ASC");

            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
            ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $row['mavattu']; ?></td>
                        <td><?php echo $row['tenvattu']; ?></td>
                        <td><?php echo $row['soluong']; ?></td>
                        <td><?php echo $row['donvitinh']; ?></td>
                        <td><?php echo $row['gia']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($row['ngaynhap'])); ?></td>
                        <td><?php echo $row['tennhacungcap']; ?></td>
                        <td>
                            <a href="sua.php?ma=<?php echo $row['mavattu']; ?>" class="btn btn-edit">Sửa</a>
                            <a href="xoa.php?ma=<?php echo $row['mavattu']; ?>" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
            <?php }
            } else {
                echo "<tr><td colspan='6'>Không có dữ liệu!</td></tr>";
            } ?>
        </table>
    </div>
</body>

</html>
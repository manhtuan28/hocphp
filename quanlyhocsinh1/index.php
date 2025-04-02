<?php
require_once "connect.php";

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

$querySum = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM hocsinh");
$rowSum = mysqli_fetch_assoc($querySum);
$SumHocSinh = $rowSum['tong'];
$SumPage = ceil($SumHocSinh / $limit);

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

    .actions {
        display: flex;
        justify-content: center;
    }

    .phanTrang {
        margin-top: 20px;
        text-align: center;
    }

    .page-btn {
        display: inline-block;
        padding: 8px 12px;
        margin: 0 5px;
        background-color: #007bff;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .page-btn:hover {
        background-color: #0056b3;
        transform: scale(1.1);
    }

    .page-btn.active {
        background-color: #28a745;
        pointer-events: none;
        opacity: 0.8;
    }
</style>

<body>
    <div class="container">
        <div class="header">
            <h1>DANH SÁCH HỌC SINH</h1>
            <a href="them.php" class="btn btn-add">Thêm học sinh</a>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Mã học sinh</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Nơi sinh</th>
                <th>Tên lớp</th>
                <th>Tác vụ</th>
            </tr>
            <?php
            $stt = $start + 1;
            $query = mysqli_query($conn, "SELECT hs.mahocsinh, hs.hoten, hs.ngaysinh, hs.gioitinh, hs.noisinh, l.tenlop FROM hocsinh hs
                        JOIN lop l ON hs.malop = l.malop ORDER BY hs.mahocsinh ASC LIMIT $limit OFFSET $start");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $bg = ($stt % 2 == 0) ? '#cccc' : '#ffff';
            ?>
                    <tr style="background-color: <?php echo $bg; ?>;">
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $row['mahocsinh']; ?></td>
                        <td><?php echo $row['hoten']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($row['ngaysinh'])); ?></td>
                        <td><?php echo $row['gioitinh']; ?></td>
                        <td><?php echo $row['noisinh']; ?></td>
                        <td><?php echo $row['tenlop']; ?></td>
                        <td><a href="sua.php?ma=<?php echo $row['mahocsinh']; ?>" class="btn btn-edit">Sửa</a> <a href="xoa.php?ma=<?php echo $row['mahocsinh']; ?>" onclick="return xacNhan()" class="btn btn-delete">Xóa</a></td>
                    </tr>
            <?php }
            } else {
                echo "<tr><td colspan='8'>Không có dữ liệu</td></tr>";
            } ?>
        </table>
        <div class="phanTrang">
            <?php
            if ($pageStart > 1) {
            ?>
                <a href="?page=<?php echo $pageStart - 1 ?>" class="page-btn">Trang trước</a>
            <?php } ?>

            <?php
            for ($i = 1; $i <= $SumPage; $i++) {
                $activeClass = ($i == $pageStart) ? 'active' : '';
            ?>
                <a href="?page=<?php echo $i; ?>" class="<?php echo $activeClass; ?> page-btn">
                    <?php echo $i; ?>
                </a>
            <?php } ?>

            <?php
            if ($pageStart < $SumPage) {
            ?>
                <a href="?page=<?php echo $pageStart + 1 ?>" class="page-btn">Trang sau</a>
            <?php } ?>
        </div>
    </div>

    <script>
        function xacNhan() {
            return confirm("Bạn chắc chắn muốn xóa?");
        }
    </script>
</body>

</html>
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

$querySum = mysqli_query($conn, "SELECT COUNT(*) AS tong FROM lop");
$rowSum = mysqli_fetch_assoc($querySum);
$studentSum = $rowSum['tong'];
$pageSum = ceil($studentSum / $limit);

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
            <h1>DANH SÁCH LỚP</h1>
            <a href="them.php" class="btn btn-add">Thêm lớp</a>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Giáo viên chủ nhiệm</th>
                <th>Sĩ số</th>
                <th>Phòng học</th>
                <th>Tác vụ</th>
            </tr>
            <?php
            $stt = $start + 1;
            $query = mysqli_query($conn, "SELECT * FROM lop LIMIT $limit OFFSET $start");
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $bg = ($stt % 2 == 0) ? '#ccc' : '#fff';
            ?>
                    <tr style="background-color: <?php echo $bg; ?>;">
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $row['malop']; ?></td>
                        <td><?php echo $row['tenlop']; ?></td>
                        <td><?php echo $row['giaovienCN']; ?></td>
                        <td><?php echo $row['siso']; ?></td>
                        <td><?php echo $row['phonghoc']; ?></td>
                        <td>
                            <a href="sua.php?ma=<?php echo $row['malop']; ?>" class="btn btn-edit">Sửa</a>
                            <a href="xoa.php?ma=<?php echo $row['malop']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-delete">Xóa</a>
                        </td>
                    </tr>
            <?php }
            } else {
                echo "<tr><td>Không có dữ liệu!</td></tr>";
            } ?>
        </table>
        <div class="phanTrang">
            <?php
            if ($pageStart > 1) {
            ?>
                <a href="?page=<?php echo $pageStart - 1; ?>" class="page-btn">Trang sau</a>
            <?php } ?>

            <?php
            for ($i = 1; $i <= $pageSum; $i++) {
                $activePhanTrang = ($i == $pageStart) ? 'active' : '';
            ?>
                <a href="?page=<?php echo $i; ?>" class="<?php echo $activePhanTrang; ?> page-btn">
                    <?php echo $i; ?>
                </a>
            <?php } ?>

            <?php
            if ($pageSum > $pageStart) {
            ?>
                <a href="?page=<?php echo $pageStart + 1 ?>" class="page-btn">Trang truóc</a>
            <?php } ?>
        </div>
    </div>
</body>

</html>
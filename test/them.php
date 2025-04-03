<?php
error_reporting(0);
require_once "connect.php";
?>

<?php
if(isset($_POST['them'])) {
    $maSach = $_POST['maSach'];
    $tenSach = $_POST['tenSach'];
    $tacGia = $_POST['tacGia'];
    $namXuatBan = $_POST['namXuatBan'];
    $theLoai = $_POST['theLoai'];
    $tenDauSach = $_POST['tenDauSach'];

    if($maSach == "") {$errmaSach = "Vui lòng nhập mã sách";}
    if($tenSach == "") {$errtenSach = "Vui lòng nhập tên sách";}
    if($tacGia == "") {$errtacGia = "Vui lòng nhập tên tác giả";}
    if($namXuatBan == "") {$errnamXuatBan = "Vui lòng nhập năm xuất bản";}
    if($theLoai == "") {$errtheLoai = "Vui lòng nhập tên thể loại";}
    if($tenDauSach == "") {$errtenDauSach = "Vui lòng chọn tên đầu sách";}

    $queryCheckMaSach = mysqli_query($conn, "SELECT * FROM sach WHERE masach = '$maSach'");

    if($maSach != "" && $tenSach != "" && $tacGia != "" && $namXuatBan != "" && $theLoai != "" && $tenDauSach != "") {
        if(mysqli_num_rows($queryCheckMaSach) > 0) {
            $errCheckMaSach = "Mã sách đã tồn tại, vui lòng nhập mã khác";
        }
        else {
            $query = mysqli_query($conn, "INSERT INTO `sach`(`masach`, `tensach`, `tacgia`, `namxuatban`, `theloai`, `mads`) 
                VALUES ('$maSach','$tenSach','$tacGia','$namXuatBan','$theLoai','$tenDauSach')");
            header("location: index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm dữ liệu</title>
</head>

<body>
    <div class="form-container">
        <a href="index.php" class="btn-back">Quay lại trang chủ</a>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Mã sách</label>
                <input type="text" name="maSach" id="" placeholder="Nhập mã sách" value="<?php echo $maSach; ?>">
                <span><?php echo $errCheckMaSach; ?></span>
                <span><?php echo $errmaSach; ?></span>
            </div>
            <div class="form-group">
                <label for="">Tên sách</label>
                <input type="text" name="tenSach" id="" placeholder="Nhập tên sách" value="<?php echo $tenSach; ?>">
                <span><?php echo $errtenSach; ?></span>
            </div>
            <div class="form-group">
                <label for="">Tác giả</label>
                <input type="text" name="tacGia" id="" placeholder="Nhập tên tác giả" value="<?php echo $tacGia; ?>">
                <span><?php echo $errtacGia; ?></span>
            </div>
            <div class="form-group">
                <label for="">Năm xuất bản</label>
                <input type="number" name="namXuatBan" id="" placeholder="Nhập năm xuất bản" min="1500" max="2025"
                    value="<?php echo $namXuatBan; ?>">
                <span><?php echo $errnamXuatBan; ?></span>
            </div>
            <div class="form-group">
                <label for="">Thể loại</label>
                <input type="text" name="theLoai" id="" placeholder="Nhập tên thể loại" value="<?php echo $theLoai; ?>">
                <span><?php echo $errtheLoai; ?></span>
            </div>
            <div class="form-group">
                <label for="">Tên đầu sách</label>
                <select name="tenDauSach" id="">
                    <option value="">-- Chọn đầu sách --</option>
                    <?php
                        $queryDS = mysqli_query($conn, "SELECT * FROM dau_sach");
                        if(mysqli_num_rows($queryDS) > 0) {
                            while($rowDS = mysqli_fetch_assoc($queryDS)) {
                                echo "<option value='{$rowDS['mads']}'>{$rowDS['tends']}</option>";
                            }
                        }
                    ?>
                </select>
                <span><?php echo $errtenDauSach; ?></span>
            </div>
            <button type="submit" name="them" class="btn">Thêm</button>
    </div>
    </form>
</body>

</html>
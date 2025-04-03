<?php
error_reporting(0);
require_once "connect.php";

if(isset($_GET['ma'])) {
    $ma = $_GET['ma'];
}
$queryHH = mysqli_query($conn, "SELECT * FROM sach WHERE masach = '$ma'");
$rowHH = mysqli_fetch_assoc($queryHH);
?>

<?php
if(isset($_POST['sua'])) {
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


    if($maSach != "" && $tenSach != "" && $tacGia != "" && $namXuatBan != "" && $theLoai != "" && $tenDauSach != "") {
        $query = mysqli_query($conn, "UPDATE `sach` 
            SET `masach`='$maSach',`tensach`='$tenSach',`tacgia`='$tacGia',`namxuatban`='$namXuatBan',`theloai`='$theLoai',`mads`='$tenDauSach' WHERE masach = '$ma'");
         header("location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa dữ liệu</title>
</head>

<body>
    <div class="form-container">
        <a href="index.php" class="btn-back">Quay lại trang chủ</a>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Mã sách</label>
                <input type="text" name="maSach" id="" placeholder="Nhập mã sách"
                    value="<?php echo $rowHH['masach']; ?>">
                <span><?php echo $errmaSach; ?></span>
            </div>
            <div class="form-group">
                <label for="">Tên sách</label>
                <input type="text" name="tenSach" id="" placeholder="Nhập tên sách"
                    value="<?php echo $rowHH['tensach']; ?>">
                <span><?php echo $errtenSach; ?></span>
            </div>
            <div class="form-group">
                <label for="">Tác giả</label>
                <input type="text" name="tacGia" id="" placeholder="Nhập tên tác giả"
                    value="<?php echo $rowHH['tacgia']; ?>">
                <span><?php echo $errtacGia; ?></span>
            </div>
            <div class="form-group">
                <label for="">Năm xuất bản</label>
                <input type="number" name="namXuatBan" id="" placeholder="Nhập năm xuất bản" min="1500" max="2025"
                    value="<?php echo $rowHH['namxuatban'];; ?>">
                <span><?php echo $errnamXuatBan; ?></span>
            </div>
            <div class="form-group">
                <label for="">Thể loại</label>
                <input type="text" name="theLoai" id="" placeholder="Nhập tên thể loại"
                    value="<?php echo $rowHH['theloai']; ?>">
                <span><?php echo $errtheLoai; ?></span>
            </div>
            <div class="form-group">
                <label for="">Tên đầu sách</label>
                <select name="tenDauSach" id="">
                    <?php
                        $queryDS = mysqli_query($conn, "SELECT * FROM dau_sach");
                        if(mysqli_num_rows($queryDS) > 0) {
                            while($rowDS = mysqli_fetch_assoc($queryDS)) {
                                if($rowHH['mads'] == $rowDS['mads']) {
                                    echo "<option value='{$rowDS['mads']}' selected>{$rowDS['tends']}</option>";
                                }
                                else {
                                    echo "<option value='{$rowDS['mads']}'>{$rowDS['tends']}</option>";
                                }
                            }
                        }
                    ?>
                </select>
                <span><?php echo $errtenDauSach; ?></span>
            </div>
            <button type="submit" name="sua" class="btn">Sửa</button>
    </div>
    </form>
</body>

</html>
<?php
error_reporting(0);
require_once "connect.php";

if (isset($_POST['add'])) {
    $tenPhim = $_POST['tenPhim'];
    $namPhatHanh = $_POST['namPhatHanh'];
    $thoiLuong = $_POST['thoiLuong'];
    $theLoai = $_POST['theLoai'];
    $daoDien = $_POST['daoDien'];
    $moTa = $_POST['moTa'];

    if ($tenPhim == "") {
        $errTenPhim = "Vui lòng nhập tên phim!";
    }
    if ($namPhatHanh == "") {
        $errNamPhatHanh = "Vui lòng nhập năm phát hành!";
    }
    if ($thoiLuong == "") {
        $errThoiLuong = "Vui lòng nhập thời lượng!";
    }
    if ($theLoai == "") {
        $errTheLoai = "Vui lòng chọn thể loại!";
    }
    if ($daoDien == "") {
        $errDaoDien = "Vui lòng chọn đạo diễn!";
    }
    if ($moTa == "") {
        $errMoTa = "Vui lòng nhập mô tả!";
    }

    if ($tenPhim != "" && $namPhatHanh != "" && $thoiLuong != "" && $theLoai != "" && $daoDien != "" && $moTa != "") {
        $sql = "INSERT INTO phim(ten_phim, nam_phat_hanh, thoi_luong, the_loai_id, dao_dien_id, mo_ta) VALUES('$tenPhim', '$namPhatHanh', '$thoiLuong', '$theLoai', '$daoDien', '$moTa')";
        $query = mysqli_query($conn, $sql);
        header("location: index.php");
    }
}
?>

<title>Thêm dữ liệu</title>
<style>
    table {
        text-align: left;
    }

    button {
        cursor: pointer;
    }

    span {
        color: red;
    }
</style>
<form action="" method="post">
    <table align="center">
        <tr>
            <th>Tên phim:</th>
            <td><input type="text" name="tenPhim" id=""></td>
            <td><span><?php echo $errTenPhim; ?></span></td>
        </tr>
        <tr>
            <th>Năm phát hành:</th>
            <td><input type="text" name="namPhatHanh" id=""></td>
            <td><span><?php echo $errNamPhatHanh; ?></span></td>
        </tr>
        <tr>
            <th>Thời lượng:</th>
            <td><input type="text" name="thoiLuong" id=""></td>
            <td><span><?php echo $errThoiLuong; ?></span></td>
        </tr>
        <tr>
            <th>Thể loại:</th>
            <td>
                <select name="theLoai" id="">
                    <option value="">-- Chọn thể loại --</option>
                    <?php
                    $queryTheLoai = mysqli_query($conn, "SELECT * FROM the_loai");

                    if (mysqli_num_rows($queryTheLoai) > 0) {
                        while ($row = mysqli_fetch_assoc($queryTheLoai)) {
                            echo "<option value='{$row['id']}'>{$row['ten_the_loai']}</option>";
                        }
                    }
                    ?>
                </select>
            <td><span><?php echo $errTheLoai; ?></span></td>
            </td>
        </tr>
        <tr>
            <th>Đạo diễn:</th>
            <td>
                <select name="daoDien" id="">
                    <option value="">-- Chọn đạo diễn --</option>
                    <?php
                    $queryDaoDien = mysqli_query($conn, "SELECT * FROM dao_dien");

                    if (mysqli_num_rows($queryDaoDien) > 0) {
                        while ($row = mysqli_fetch_assoc($queryDaoDien)) {
                            echo "<option value='{$row['id']}'>{$row['ten_dao_dien']}</option>";
                        }
                    }
                    ?>
                </select>
            <td><span><?php echo $errDaoDien; ?></span></td>
            </td>
        </tr>
        <tr>
            <th>Mô tả:</th>
            <td><input type="text" name="moTa" id=""></td>
            <td><span><?php echo $errMoTa; ?></span></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit" name="add">Thêm</button></td>
        </tr>
    </table>
</form>
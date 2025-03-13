<?php
error_reporting(0);
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<?php
$query = mysqli_query($conn, "SELECT p.id, p.ten_phim, p.nam_phat_hanh, p.thoi_luong, p.the_loai_id, p.dao_dien_id, tl.ten_the_loai, dd.ten_dao_dien, p.mo_ta FROM phim p
        JOIN the_loai tl ON p.the_loai_id = tl.id
        JOIN dao_dien dd ON p.dao_dien_id = dd.id WHERE p.id = $id");
$row = mysqli_fetch_assoc($query);
?>

<?php
if (isset($_POST['change'])) {
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
        $sql = "UPDATE phim SET ten_phim = '$tenPhim', nam_phat_hanh = '$namPhatHanh', thoi_luong = '$thoiLuong', the_loai_id = '$theLoai', dao_dien_id = '$daoDien', mo_ta = '$moTa' WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        header("location: index.php");
    }
}
?>

<title>Sửa dữ liệu</title>
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
            <td><input type="text" name="tenPhim" id="" value="<?php echo $row['ten_phim']; ?>"></td>
            <td><span><?php echo $errTenPhim; ?></span></td>
        </tr>
        <tr>
            <th>Năm phát hành:</th>
            <td><input type="text" name="namPhatHanh" id="" value="<?php echo $row['nam_phat_hanh']; ?>"></td>
            <td><span><?php echo $errNamPhatHanh; ?></span></td>
        </tr>
        <tr>
            <th>Thời lượng:</th>
            <td><input type="text" name="thoiLuong" id="" value="<?php echo $row['thoi_luong']; ?>"></td>
            <td><span><?php echo $errThoiLuong; ?></span></td>
        </tr>
        <tr>
            <th>Thể loại:</th>
            <td>
                <select name="theLoai" id="">
                    <?php
                    $queryTheLoai = mysqli_query($conn, "SELECT * FROM the_loai");

                    while ($theLoai = mysqli_fetch_assoc($queryTheLoai)) {
                        if ($theLoai['id'] == $row['the_loai_id']) {
                            echo "<option value='{$theLoai['id']}' selected>{$theLoai['ten_the_loai']}</option>";
                        } else {
                            echo "<option value='{$theLoai['id']}'>{$theLoai['ten_the_loai']}</option>";
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
                    <?php
                    $queryDaoDien = mysqli_query($conn, "SELECT * FROM dao_dien");

                    if (mysqli_num_rows($queryDaoDien) > 0) {
                        while ($daoDien = mysqli_fetch_assoc($queryDaoDien)) {
                            if ($daoDien['id'] == $row['dao_dien_id']) {
                                echo "<option value='{$daoDien['id']}' selected>{$daoDien['ten_dao_dien']}</option>";
                            } else {
                                echo "<option value='{$daoDien['id']}'>{$daoDien['ten_dao_dien']}</option>";
                            }
                        }
                    }
                    ?>
                </select>
            <td><span><?php echo $errDaoDien; ?></span></td>
            </td>
        </tr>
        <tr>
            <th>Mô tả:</th>
            <td><input type="text" name="moTa" id="" value="<?php echo $row['mo_ta']; ?>"></td>
            <td><span><?php echo $errMoTa; ?></span></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit" name="change">Sửa</button></td>
        </tr>
    </table>
</form>
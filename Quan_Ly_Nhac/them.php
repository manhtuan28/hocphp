<?php
error_reporting(0);
require_once "connect.php";

if (isset($_POST['add'])) {
    $tenBaiHat = $_POST['tenBaiHat'];
    $album = $_POST['album'];
    $theLoai = $_POST['theLoai'];
    $ngheSi = $_POST['ngheSi'];
    $thoiLuong = $_POST['thoiLuong'];
    $ngayPhatHanh = $_POST['ngayPhatHanh'];

    if ($tenBaiHat == "") {
        $errorTenBaiHat = "Vui lòng nhập tên bài hát!";
    }
    if ($album == "") {
        $errorAlbum = "Vui lòng chọn album!";
    }
    if ($theLoai == "") {
        $errorTheLoai = "Vui lòng chọn thể loại!";
    }
    if ($ngheSi == "") {
        $errorNgheSi = "Vui lòng chọn nghệ sĩ!";
    }
    if ($thoiLuong == "") {
        $errorThoiLuong = "Vui lòng nhập thời lượng!";
    }
    if ($ngayPhatHanh == "") {
        $errorNgayPhatHanh = "Vui lòng chọn ngày phát hành!";
    }

    if ($tenBaiHat != ""  && $album != "" && $theLoai != "" && $ngheSi != "" && $thoiLuong != "" && $ngayPhatHanh != "") {
        $sql = "INSERT INTO bai_hat(ten_bai_hat, album_id, the_loai_id, nghe_si_id, thoi_luong, ngay_phat_hanh) VALUES('$tenBaiHat', '$album', '$theLoai', $ngheSi, '$thoiLuong', '$ngayPhatHanh')";
        $query = mysqli_query($conn, $sql);
        header("Location: index.php");
    }
}

?>

<title>Thêm dữ liệu</title>
<style>
    table {
        text-align: left;
    }

    td {
        padding-left: 12px;
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
            <th>Tên bài hát:</th>
            <td><input type="text" name="tenBaiHat" id=""></td>
            <td><span><?php echo $errorTenBaiHat; ?></span></td>
        </tr>
        <tr>
            <th>Album:</th>
            <td>
                <select name="album" id="">
                    <option value="">-- Chọn Album --</option>
                    <?php
                    $queryAlbum = mysqli_query($conn, "SELECT * FROM album");
                    while ($row = mysqli_fetch_assoc($queryAlbum)) {
                        echo "<option value='{$row['id']}'>{$row['ten_album']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td><span><?php echo $errorAlbum; ?></span></td>
        </tr>
        <tr>
            <th>Thể loại:</th>
            <td>
                <select name="theLoai" id="">
                    <option value="">-- Chọn Thể Loại --</option>
                    <?php
                    $queryTheLoai = mysqli_query($conn, "SELECT * FROM the_loai");
                    while ($row = mysqli_fetch_assoc($queryTheLoai)) {
                        echo "<option value='{$row['id']}'>{$row['ten_the_loai']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td><span><?php echo $errorTheLoai; ?></span></td>
        </tr>
        <tr>
            <th>Nghệ sĩ:</th>
            <td>
                <select name="ngheSi" id="">
                    <option value="">-- Chọn Nghệ Sĩ --</option>
                    <?php
                    $queryNgheSi = mysqli_query($conn, "SELECT * FROM nghe_si");
                    while ($row = mysqli_fetch_assoc($queryNgheSi)) {
                        echo "<option value='{$row['id']}'>{$row['ten_nghe_si']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td><span><?php echo $errorNgheSi; ?></span></td>
        </tr>
        <tr>
            <th>Thời lượng:</th>
            <td><input type="text" name="thoiLuong" id=""></td>
            <td><span><?php echo $errorThoiLuong; ?></span></td>
        </tr>
        <tr>
            <th>Ngày phát hành:</th>
            <td><input type="date" name="ngayPhatHanh" id=""></td>
            <td><span><?php echo $errorNgayPhatHanh; ?></span></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit" name="add">Thêm</button></td>
        </tr>
    </table>
</form>
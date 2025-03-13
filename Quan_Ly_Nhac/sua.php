<?php
error_reporting(0);
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>

<?php
$query = mysqli_query($conn, "SELECT bh.id, bh.ten_bai_hat, bh.album_id, bh.the_loai_id, bh.nghe_si_id, ab.ten_album, tl.ten_the_loai, ns.ten_nghe_si, bh.thoi_luong, bh.ngay_phat_hanh FROM bai_hat bh
                JOIN album ab ON bh.album_id = ab.id
                JOIN the_loai tl ON bh.the_loai_id = tl.id
                JOIN nghe_si ns ON bh.nghe_si_id = ns.id WHERE bh.id = $id");
$row = mysqli_fetch_array($query);
?>

<?php
if (isset($_POST['change'])) {
    $tenBaiHat = $_POST['tenBaiHat'];
    $album = $_POST['album'];
    $theLoai = $_POST['theLoai'];
    $ngheSi = $_POST['ngheSi'];
    $thoiLuong = $_POST['thoiLuong'];
    $ngayPhatHanh = $_POST['ngayPhatHanh'];

    $sql = "UPDATE bai_hat SET ten_bai_hat = '$tenBaiHat', album_id = '$album', the_loai_id = '$theLoai', nghe_si_id = '$ngheSi', thoi_luong = '$thoiLuong', ngay_phat_hanh = '$ngayPhatHanh' WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>

<title>Sửa dữ liệu</title>
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
</style>
<form action="" method="post">
    <table align="center">
        <tr>
            <th>Tên bài hát:</th>
            <td><input type="text" name="tenBaiHat" id="" value="<?php echo $row['ten_bai_hat']; ?>"></td>
        </tr>
        <tr>
            <th>Album:</th>
            <td>
                <select name="album" id="">
                    <?php
                    $queryAlbum = mysqli_query($conn, "SELECT * FROM album");

                    while ($album = mysqli_fetch_assoc($queryAlbum)) {
                        if ($album['id'] == $row['album_id']) {
                            echo "<option value='{$album['id']}' selected>{$album['ten_album']}</option>";
                        } else {
                            echo "<option value='{$album['id']}'>{$album['ten_album']}</option>";
                        }
                    }
                    ?>
                </select>
            </td>
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
            </td>
        </tr>
        <tr>
            <th>Nghệ sĩ:</th>
            <td>
                <select name="ngheSi" id="">
                    <?php
                    $queryNgheSi = mysqli_query($conn, "SELECT * FROM nghe_si");

                    while ($ngheSi = mysqli_fetch_assoc($queryNgheSi)) {
                        if ($ngheSi['id'] == $row['nghe_si_id']) {
                            echo "<option value='{$ngheSi['id']}' selected>{$ngheSi['ten_nghe_si']}</option>";
                        } else {
                            echo "<option value='{$ngheSi['id']}'>{$ngheSi['ten_nghe_si']}</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Thời lượng:</th>
            <td><input type="text" name="thoiLuong" id="" value="<?php echo $row['thoi_luong']; ?>"></td>
        </tr>
        <tr>
            <th>Ngày phát hành:</th>
            <td><input type="date" name="ngayPhatHanh" id="" value="<?php echo $row['ngay_phat_hanh']; ?>"></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit" name="change">Sửa</button></td>
        </tr>
    </table>
</form>
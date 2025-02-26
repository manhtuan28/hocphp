<?php
error_reporting(0);

// Tạo ngẫu nhiên mảng
function create_array($n) {
    $str = 0;

    for($i = 0; $i < $n; $i++) {
        $arr[$i] = rand(0,100);
    }
    return $arr;
}

// Xuất mảng
function export_array($arr) {
    $str = "";
    for($i = 0; $i < count($arr); $i++) {
        $str = $str . $arr[$i] . " ";
    }

    return $str;
}

// Tính Tổng mảng
function sum_array($arr){
    $sum = 0;
    for($i = 0; $i < count($arr); $i++) {
        $sum += $arr[$i];
    }

    return $sum;
}

// Tính tổng chẵn Mảng
function sum_array_chan($arr){
    $sum_chan = 0;

    for($i = 0; $i < count($arr); $i++) {
        if($arr[$i] % 2 == 0) {
            $sum_chan += $arr[$i];
        }
    }

    return $sum_chan;
}

// Sắp xếp tăng
function sapXepTang($arr){
    $c = count($arr);

    for($i = 0; $i < $c - 1; $i++) {
        for($j = 0; $j < $c - $i - 1; $j++){
            if($arr[$j] > $arr[$j + 1]) {
                $tg = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tg;
            }
        }
    }

    return $arr;
}

if (isset($_POST['soPhanTu'])) {
    $n = $_POST['soPhanTu'];
    
    $arr = create_array($n);
    $result_arr = export_array(array_unique($arr));

    $sum_array = sum_array($arr);
    $sum_array_chan = sum_array_chan($arr);

    $sapXepTang = sapXepTang($arr);
    $sapXepTangstr = implode(",",$sapXepTang);
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
</head>

<body>
    <form action="" method="post">
        <div class="title">Phát sinh mảng và tính toán</div>
        <div class="form-input">
            <div class="box-input">
                <span>Nhập số phần tử</span>
                <input type="text" name="soPhanTu" id="" required value="<?php echo $n; ?>">
                <button>Phát sinh và tính toán</button>
            </div>
            <div class="box-input">
                <span>Mảng</span>
                <input type="text" name="array" id="" readonly value="<?php echo $result_arr; ?>">
            </div>
            <div class="box-input">
                <span>Tổng các phần tử</span>
                <input type="text" name="sum-array" id="" readonly value="<?php echo $sum_array; ?>">
            </div>
            <div class="box-input">
                <span>Tổng các phần tử chẵn:</span>
                <input type="text" name="sum-array-chan" id="" readonly value="<?php echo $sum_array_chan; ?>">
            </div>
            <div class="box-input">
                <span>Sắp xếp mảng tăng dần:</span>
                <input type="text" name="sapXepTang" id="" readonly value="<?php echo $sapXepTangstr; ?>">
            </div>
        </div>
    </form>
</body>

</html>
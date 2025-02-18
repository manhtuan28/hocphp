<?php
$baiHoc = [
    'Bài 1.2' => './Bai-1.2/index.php',
    'Bài 2.1' => './Bai-2.1/index.php',
    'Bài 2.2' => './Bai-2.2/index.php',
    'Bài 2.3' => './Bai-2.3/index.php',
    'Bài 2.4' => './Bai-2.4/index.php',
    'Bài 2.5' => './Bai-2.5/index.php',
    'Bài 2.6' => './Bai-2.6/index.php',
    'Bài 2.7' => './Bai-2.7/index.php',
    'Bài 2.8' => './Bai-2.8/index.php',
    'Bài 2.9' => './Bai-2.9/index.php',
    'Bài 2.10' => './Bai-2.10/index.php',
    'Bài 2.11' => './Bai-2.11/index.php',
    'Bài 2.12' => './Bai-2.12/index.php',
    'Bài 2.13' => './Bai-2.13/index.php',
    'Bài 2.14' => './Bai-2.14/index.php',
    'Bài 2.15' => './Bai-2.15/index.php',
    'Bài 2.16' => './Bai-2.16/index.php',
    'Bài 2.17' => './Bai-2.17/index.php',
    'Bài 2.20' => './Bai-2.20/index.php',
    'Bài 3.1' => './Bai-3.1/index.php',
    'Bài 3.5' => './Bai-3.5/index.php',
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['chuyentrang'])) {
        $baiDuocChon = $_POST['chuyentrang'];

        if (array_key_exists($baiDuocChon, $baiHoc)) {
            header('Location: ' . $baiHoc[$baiDuocChon]);
            exit();
        } else {
            echo "Trang không tồn tại!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển trang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: #ffffff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:active {
            transform: scale(0.98);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Chọn bài tiểu nhân</h1>
        <form action="" method="POST">
            <?php foreach ($baiHoc as $bai => $duongDan): ?>
                <button type="submit" name="chuyentrang" value="<?= $bai ?>"> <?= ucfirst($bai) ?> </button>
            <?php endforeach; ?>
            <div>Tuấn Quân Tử</div>
        </form>
    </div>
</body>

</html>

<!-- Code By Tuancute -->
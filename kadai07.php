<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

$numbers = [];
$nonNumbers = [];

foreach ($_POST['field'] as $value) {
    $trimmed = trim($value);
    // 全角数字を半角に変換にする
    $normalized = mb_convert_kana($trimmed, 'n', 'UTF-8');
    if ($normalized !== '' && is_numeric($normalized)) {
        // 数字なら
        $numbers[] = htmlspecialchars($trimmed, ENT_QUOTES, 'UTF-8');
    } else {
        // 数字以外
        $nonNumbers[] = htmlspecialchars($trimmed, ENT_QUOTES, 'UTF-8');
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>kadai07</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/style.css">
  <style>
    table {
        border-collapse: collapse;
        width: 80%;
    }

    th, td {
        border: 1px solid;
    }
    .container {
        max-width: 600px;
        margin: 40px auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>kadai07</h1>
    <pre>
    <table>
        <thead>
            <tr>
                <th>数字</th>
                <th>数字以外</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?= !empty($numbers) ? implode(' ', $numbers) : 'なし' ?></td>
                <td><?= !empty($nonNumbers) ? implode(' ', $nonNumbers) : 'なし' ?></td>
            </tr>
        </tbody>
    </table>
    </pre>
   </div>
</body>
</html>

<?php
mb_internal_encoding('UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

// 入力を受け取る
$kana = trim($_POST['kana'] ?? '');
$name = trim($_POST['name'] ?? '');
$tel  = trim($_POST['tel']  ?? '');


// ひらがなを全てカタカナに変換する
$kanaNormalized = mb_convert_kana($kana, 'C', 'UTF-8');

// HTMLエスケープ
$kana = htmlspecialchars($kanaNormalized, ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$tel  = htmlspecialchars($tel, ENT_QUOTES, 'UTF-8');
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>kadai08</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/style.css">
  <style>
    .container {
        max-width: 600px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>kadai08</h1>
    <pre>

    <?php if (preg_match('/\D/u', $tel)): ?>
        <p>電話番号に数字以外が含まれています。</p>
        <p><a href="kadai08.html">戻る</a></p>
    
    <?php else: ?>
        <p>カナ： <?= htmlspecialchars($kana, ENT_QUOTES, 'UTF-8') ?></p>
        <p>氏名： <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></p>
        <p>電話番号： <?= htmlspecialchars($tel, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif;?>
    </pre>
  </div>
</body>
</html>
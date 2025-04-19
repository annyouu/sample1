<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>Practice</h2>
<pre>
<?php
/* ここに、PHPのプログラムを記述します */
// print "現在の時刻は、" . date("G時 i分 s秒") . "です。";
// $sum = 100+150;
date_default_timezone_set('Asia/Tokyo');
print(date('Y年 n月 d日は、 l') . 'です。' . PHP_EOL);
$date = new DateTime('now');
$date->modify('+1 year');
$date->modify('+3 day');
echo $date->format('Y年 n月 d日は、 l') . 'です。';
?>
<!-- 合計金額は: <?php print($sum); ?>円です -->
</pre>
</main>
</body>    
</html>
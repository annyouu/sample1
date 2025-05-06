<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>RSSを1件ずつ追記表示</title>

</head>
<body>
  <h1>RSSを取得して1件ずつログに追記・表示</h1>

<?php

$logFile = __DIR__ . '/news.txt';
$rss_url = 'https://techacademy.jp/magazine/feed';

// 既存タイトル一覧を取得
$existingTitles = [];
if (file_exists($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // 正規化表現
        if (preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2} – (.+)/', $line, $matches)) {
            $existingTitles[] = trim($matches[1]);
        }
    }
}

// RSS取得
$feed = @file_get_contents($rss_url);
if ($feed === false) {
    echo '<p>RSSの取得に失敗しました。</p>';
    exit;
}

// XML解析
libxml_use_internal_errors(true);
$rss = simplexml_load_string($feed);
if ($rss === false || !isset($rss->channel->item)) {
    echo '<p>RSSの解析に失敗しました。</p>';
    exit;
}

// 新しい1件をログファイルに追加
$added = false;
foreach ($rss->channel->item as $item) {
    $title = trim((string)$item->title);
    $link  = trim((string)$item->link);
    $rawDate = (string)$item->pubDate;
    $pubDate = date('Y-m-d H:i:s', strtotime($rawDate));

    if (!in_array($title, $existingTitles, true)) {
        $line = "{$pubDate} – {$title}\n";
        if (file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX) === false) {
            echo '<p>news.txt への書き込みに失敗しました。</p>';
            exit;
        }
        $added = true;
        break; // 1件のみ
    }
}

if (!$added) {
    echo '<p>新しいニュースはありません。</p>';
}


echo '<h2>ニュースログ</h2>';

foreach ($rss->channel->item as $item) {
    $title = trim((string)$item->title);
    $rawDate = (string)$item->pubDate;
    $pubDate = date('Y-m-d H:i:s', strtotime($rawDate));

    // ログファイルに含まれているタイトルだけ表示
    if (in_array($title, $existingTitles) || ($added && $title === trim((string)$rss->channel->item[0]->title))) {
        echo "<p>{$pubDate} – {$title}</p>";
    }
}

?>

</body>
</html>

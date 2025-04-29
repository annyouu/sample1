<!-- index.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>簡易掲示板</title>
</head>
<body>
    <h1>簡易掲示板</h1>

    <!-- フォーム -->
    <form action="index.php" method="post">
        <label for="name">名前：</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="comment">コメント：</label>
        <input type="text" name="comment" id="comment" required><br><br>

        <button type="submit">送信</button>
    </form>

    <hr>

    <?php
    // POSTで送信されているかチェック
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['name']) && isset($_POST['comment'])) {
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);

            echo "<p>名前: {$name}</p>";
            echo "<p>コメント: {$comment}</p>";
        }
    }
    ?>
</body>
</html>

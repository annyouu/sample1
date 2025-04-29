<!-- index.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>九九表</title>
    <style>
        table {
            border-collapse: collapse;
            text-align: center;
        }

        td {
            border: 1px solid #333; 
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>九九表</h1>
    <table border = "1">
        <?php
        for ($i = 1; $i <= 9; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 9; $j++) {
                $result = $i * $j;
                echo "<td> $result </td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
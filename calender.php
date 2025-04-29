<?php 
$year = date("Y");
$month = date("n");

// 月初めのタイムスタンプ
$firstDay = strtotime("$year-$month-01");

// 月初めの曜日
$startWeek = date("w", $firstDay);

// 月の日数
$dayInMonth = date("t", $firstDay);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo $year; ?>年<?php echo $month; ?>月のカレンダー</title>
    <style>
        table {
            border-collapse: collapse;
            text-align: center;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            height: 50px;
            width: 15%;
        }
    </style>
</head>

<body>

<h1><?php echo $year; ?>年<?php echo $month; ?>月のカレンダー</h1>

<table>
    <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
    </tr>

    <tr>
    <?php
    //最初の空白(曜日調整)
    for ($i = 0; $i < $startWeek; $i++) {
        echo "<td></td>";
    }
    // 日付を出力
    for ($day = 1; $day <= $dayInMonth; $day++) {
        echo "<td>$day</td>";

        // 土曜日なら改行
        if(($day + $startWeek) % 7 == 0) {
            echo "</tr><tr>";
        }
    }

    // 月末後の空白
    $endBlank = (7 - ($startWeek + $daysInMonth) % 7) % 7;
    for ($i = 0; $i < $endBlank; $i++) {
        echo "<td></td>";
    }
    ?>
    </tr>

</table>
</body>
</html>
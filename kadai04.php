<!-- index.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>時間割表</title>
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
    <h1>時間割表</h1>
    <table border = "1">
        <?php
        $zikanwari = [
            'DAY1' => '月',
            'MON1' => '電気電子', 'MON2' => '電気電子', 'MON3' => '',
            'MON4' => '', 'MON5' => '',

            'DAY2' => '火',
            'TUE1' => 'SSs', 'TUE2' => 'SSs', 'TUE3' => 'Webプロ',
            'TUE4' => 'Webプロ', 'TUE5' => '',

            'DAY3' => '水',
            'WED1' => '', 'WED2' => '', 'WED3' => '',
            'WED4' => '情報L', 'WED5' => '情報L',

            'DAY4' => '木',
            'THU1' => 'MD3', 'THU2' => 'MD3', 'THU3' => '',
            'THU4' => '情報L', 'THU5' => '情報L',

            'DAY5' => '金',
            'FRI1' => '', 'FRI2' => '', 'FRI3' => '',
            'FRI4' => '', 'FRI5' => '',
        ];
        ?>

        <thead>
            <tr>
                <th></th>
                <th>1限</th>
                <th>2限</th>
                <th>3限</th>
                <th>4限</th>
                <th>5限</th>
            </tr>
        </thead>

        <tbody>
            <?php
                 $num = 0;
                 foreach ($zikanwari as $key => $value) :
                    if ($num == 0) : ?>
                        <tr>
                    <?php endif; ?>

                    <td><?php echo $value ?></td>

                    <?php if ($num++ % 6 == 5) : ?>
                        </tr>
                    <?php endif; ?>
                
                <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
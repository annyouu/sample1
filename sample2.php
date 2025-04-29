<?php
$fruits = ["apple", "banana", "orange"];


// foreach：配列を一個ずつ取り出して繰り返し処理するための便利な構文
// $fruits = ["apple", "banana", "orange"];

// foreach($fruits as $fruit) {
//     echo $fruit . "<br>";
// }

?>


<?php
// 連想配列(番号ではなく、好きな名前(キー)をつける配列のこと)
$person = [
    "name" => "Taro",
    "age" => 25,
    "job" => "artist"
];
?>

<table border="1">

<?php foreach ($person as $key => $value): ?>
    <tr>
        <td><?php echo $key; ?></td>
        <td><?php echo $value; ?></td>
    </tr>
<?php endforeach; ?>
</table>







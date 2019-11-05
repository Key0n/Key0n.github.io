<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ответ</title>
</head>

<body>
    <a href="lab4.html">Назад</a>
    <br><br>
    <?php
    $amount = $_POST['amount'];
    $array_1 = array();
    $array_2 = array();

    for ($i = 0; $i < $amount; $i++) {
        $array_1[$i] = rand($i, ($i + 1) * 5);
        $array_2[$i] = rand($i, ($i + 1) * 5);
    }

    echo 'Cгенерированный <br>';
    echo 'Массив 1 - ' . implode(' ', $array_1);
    echo '<br>';
    echo 'Массив 2 - ' . implode(' ', $array_2);
    echo '<br><br>';

    echo 'Без повторений <br>';
    $new_array_1 = array_unique($array_1);
    $new_array_2 = array_unique($array_2);
    echo 'Массив 1 - ' . implode(' ', $new_array_1);
    echo '<br>';
    echo 'Массив 2 - ' . implode(' ', $new_array_2);
    echo '<br><br>';

    $len_array_1 = count($array_1) - count($new_array_1);
    $len_array_2 = count($array_2) - count($new_array_2);

    echo "Количество повторений массива 1 - $len_array_1 <br>";
    echo "Количество повторений массива 2 - $len_array_2 <br><br>";

    echo 'Новый массив без повторений <br>';
    $new_array = array_merge(array_unique($array_1), array_unique($array_2));
    echo implode(' ', $new_array);
    echo '<br><br>';

    echo 'Новый массив перевернутый <br>';
    $new_reversed_array = array();
    $length_array = count($new_array);
    
    foreach ($new_array as $value) {
        array_unshift($new_reversed_array, $value);
    }
    echo implode(' ', $new_reversed_array);
    ?>
</body>

</html>
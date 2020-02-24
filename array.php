<pre>
<?php
$arr = [
    1,
    2,
    3,
    true,
    [
        5,
        6,
        100500,
        [
            7,
            8,
            -1

        ],
    ],
];

$result = [];
array_walk_recursive(
    $arr,
    function ($item) use (&$result) {
        $result[] = $item;
    }
);

$maxElementOfArr = max($result);
echo 'Задание №1 - Максимальный элемент массива равен: ' . $maxElementOfArr . '<br>';

$arrayOfNumeric = [];
foreach ($result as $item) {
    if (is_numeric($item)) {
        $arrayOfNumeric[] = $item;
    }
}

echo '<br>' . 'Задание №2 - Отфильтрованный массив числовых значений: ' . '<br>';

foreach ($arrayOfNumeric as $item) {
    echo $item . '<br>';
}

sort($arrayOfNumeric, SORT_NUMERIC);

$numberOfElementInArr = count($arrayOfNumeric);

if ($numberOfElementInArr % 2 === 0) {
    $medOfArray = $arrayOfNumeric[$numberOfElementInArr / 2];
    echo '<br>' . 'Задание №3 - Медиана массива равна: ' . $medOfArray . '<br>';
} else {
    $averageElement = $numberOfElementInArr / 2;
    $key1 = ceil($averageElement);
    $key2 = floor($averageElement);
    $medOfArray = ($arrayOfNumeric[$key1] + $arrayOfNumeric[$key2]) / 2;
    echo '<br>' . 'Задание №3  - Медиана массива равна: ' . $medOfArray . '<br>';
}

foreach ($arrayOfNumeric as $item) {
    if ($item > ($medOfArray * 2)) {
        continue;
    } elseif ($item < ($medOfArray * 2 * (-1))) {
        continue;
    } else {
        $arrayOfSortNumeric[] = $item;
    }
}
echo '<br>' . 'Задание №3  - Все  элементы массива, которые больше и меньше медианы в 2 раза отфильтрованы: ' . '<br>';
foreach ($arrayOfSortNumeric as $item) {
    echo $item . '<br>';
}

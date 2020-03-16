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

/**
 * @param array $arr
 */
function printArray(array $arr) {
    foreach ($arr as $item) {
        echo $item . '<br>';
    }
}

$result = [];
array_walk_recursive(
    $arr,
    function ($item) use (&$result) {
        $result[] = $item;
    }
);

$maxElementOfArr = max($result);
echo 'Задание №1 - Максимальный элемент массива равен: ' . $maxElementOfArr . '<br>';

$arrayOfNumeric = array_filter($result, 'is_numeric');

echo '<br>Задание №2 - Отфильтрованный массив числовых значений:<br>';
printArray($arrayOfNumeric);

sort($arrayOfNumeric, SORT_NUMERIC);
$averageElement = count($arrayOfNumeric) / 2;

if (is_int($averageElement)) {
    $medOfArray = ($arrayOfNumeric[$averageElement] + $arrayOfNumeric[$averageElement + 1]) / 2;
} else {
    $medOfArray = $arrayOfNumeric[floor($averageElement)];
}
echo '<br>' . 'Задание №3 - Медиана массива равна: ' . $medOfArray . '<br>';

$arrayOfSortNumeric = array_filter($arrayOfNumeric, function ($value) use ($medOfArray) {
   return $value > $medOfArray / 2 && $value <= $medOfArray * 2;
});
echo '<br>' . 'Задание №3  - Все  элементы массива, которые больше и меньше медианы в 2 раза отфильтрованы: ' . '<br>';
printArray($arrayOfSortNumeric);

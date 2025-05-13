<?php

$a = 10;
$b = 3;

echo $a % $b;
echo "\n";

// Проверка на деление без остатка
if ($a % $b == 0) {
    echo "Делится: " . ($a / $b) . "\n";
} else {
    echo "Делится с остатком: " . ($a % $b) . "\n";
}


// Работа со степенью и корнем

$st = pow(2,10);
echo "2 в 10: ", $st . "\n";

$sqrt = sqrt(245);
echo "Корень из 245: ", $sqrt . "\n";


$arr = [4, 2, 5, 19, 13, 0, 10];
$sum = 0;
foreach ($arr as $value) {
    $sum += pow($value, 2);
}
echo "Корень из суммы квадратов элементов: ", $sum;
echo "\n";

// Работа с функциями округления

$sqrt379 = sqrt(379);
echo "Корень из 379: ", $sqrt379 . "\n";
echo "Округление: \n";
echo "До целых: " . round($sqrt379) . "\n";
echo "До десятых: " . round($sqrt379, 1) . "\n";
echo "До сотых: " . round($sqrt379, 2) . "\n";


$sqrt587 = sqrt(587);
$roundArray = [
    'floor' => floor($sqrt587),
    'ceil' => ceil($sqrt587)
];
echo "Корень из 587: ", $sqrt587, "\n";
echo "Округление квадратного корня из 587: floor = {$roundArray['floor']}, ceil = {$roundArray['ceil']}\n";


// Работа с min и max

$nums = [4, -2, 5, 19, -130, 0, 10];
echo "Минимум: " . min($nums) . "\n";
echo "Максимум: " . max($nums) . "\n";

echo "Случайное число от 1 до 100: " . rand(1, 100) . "\n";

$randomArray = [];
for ($i = 0; $i < 10; $i++) {
    $randomArray[] = rand(1, 100);
}
echo "Массив из 10 случайных чисел:\n";
print_r($randomArray);

// Работа с модулем

$a = 20;
$b = 50;
echo "Модуль разности между $a и $b: " . abs($a - $b) . "\n";


$original = [1, 2, -1, -2, 3, -3];
$positiveArray = [];
foreach ($original as $num) {
    $positiveArray[] = abs($num);
}
echo "Массив с положительными числами:\n";
print_r($positiveArray);


$number = 678;
$divisors = [];
for ($i = 1; $i <= $number; $i++) {
    if ($number % $i == 0) {
        $divisors[] = $i;
    }
}
echo "Делители числа $number:\n";
print_r($divisors);


$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$sum = 0;
$count = 0;
foreach ($array as $value) {
    $sum += $value;
    $count++;
    if ($sum > 10) {
        break;
    }
}
echo "Нужно сложить $count элементов.\n";
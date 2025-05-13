<?php
function increaseEnthusiasm($str): string{
    return $str . "!";
}
echo increaseEnthusiasm("Поставьте зачет, пожалуйста") . "\n";

function repeatThreeTimes($str) {
    return $str . $str . $str;
}
echo repeatThreeTimes("Пожалуйста") . "\n";

echo increaseEnthusiasm(repeatThreeTimes("Ну пожалуйста")) . "\n";

function cut($str, $length = 10): string
{
    return substr($str, 0, $length);
}

echo cut("Ne rabotaet s russkim") . "\n";

function Recursia($arr, $index = 0) {
    if ($index < count($arr)) {
        echo $arr[$index] . "\n";
        Recursia($arr, $index + 1);
    }
}
$nums = [65, 245, 324, 244, 565];
Recursia($nums);
echo "\n";

function sumDigitsRecursively($num) {

    $split = str_split($num);
    $sum = array_sum($split);
    if ($sum > 9) {
        return sumDigitsRecursively($sum);
    }
    return $sum;
}

echo sumDigitsRecursively(987);

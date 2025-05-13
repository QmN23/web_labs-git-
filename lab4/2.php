<?php

$str = "a1b2c3"; //Заменить числа на их значение в степени 5
$reg = "/[0-9]/";

function func($matches){
    return pow($matches[0], 5);
}

$result = preg_replace_callback($reg, "func", $str);

echo $result;
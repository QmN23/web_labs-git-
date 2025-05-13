<?php

$str = 'rfgfrggtrrr ffdsrrffrtrrrf fxssfrrrghsajhrrr rrjfsdjfrrrfjsdrrfrrfr rrrrf frrrfsdfr';
$reg = "/r...r/"; // 'r' + три любых символа + 'r'

$matches = array();

$count = preg_match_all($reg, $str, $matches);

echo "Найдено строк: $count \n";
var_dump($matches);
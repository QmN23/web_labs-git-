<?php
function printStringReturnNumber()
{
    echo "Это строка из функции.\n";
    return 42;
}

$my_num = printStringReturnNumber();
echo "Возвращённое число: $my_num\n";


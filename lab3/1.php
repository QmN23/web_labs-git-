<?php
$very_bad_unclear_name = "15 chicken wings";

$order = &$very_bad_unclear_name;
$order .= "don't order 15 chicken wings";

echo "\nYour order is: $very_bad_unclear_name.";
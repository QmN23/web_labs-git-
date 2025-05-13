<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];

    // Находим все отдельные цифры
    preg_match_all('/[0-9]/u', $text, $digits);
    $digitCount = count($digits[0]);

    // Находим целые числа (целые последовательности цифр)
    preg_match_all('/[0-9]+/u', $text, $numbers);
    $numberCount = count($numbers[0]);

    echo "<h2>Результаты анализа</h2>";
    echo "<p><strong>Цифр всего:</strong> $digitCount</p>";
    echo "<p><strong>Чисел всего:</strong> $numberCount</p>";
} else {
    header("Location: index.html");
    exit;
}

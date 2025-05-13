<?php

// GET-запрос
// Инициация cURL-сеанса
$url = "https://jsonplaceholder.typicode.com/posts/1";
$ch = curl_init($url);

// Устанавливаем URL-адрес
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);

// Передаем страницу браузеру и получаем ответ
$ex = curl_exec($ch);
// Закрываем сессию
curl_close($ch);

// Выводим результат GET-запроса
echo "GET Response:\n$ex\n";

// POST-запрос
// Инициация cURL-сеанса
$url = "https://jsonplaceholder.typicode.com/posts";
$ch = curl_init($url);

$data = [
    'title' => 'Text',
    'body' => 'text',
    'userId' => 1
];

// Настройка параметров для POST-запроса
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Выполнение POST-запроса и получение ответа
$ex = curl_exec($ch);

// Закрытие сессии cURL
curl_close($ch);

// Выводим результат POST-запроса
echo "POST Response:\n$ex\n";

// PUT-запрос

// Обновленная data
$newData = [
    'id' => 1,
    'title' => 'Text',
    'body' => 'TTText',
    'userId' => 1
];

$url = "https://jsonplaceholder.typicode.com/posts/1";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($newData));

$ex = curl_exec($ch);

curl_close($ch);
echo "PUT Response:\n$ex\n";


// === DELETE-запрос ===
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$ex = curl_exec($ch);
curl_close($ch);

echo "DELETE Response:\n$ex\n";

$info = curl_getinfo($ch);
echo "HTTP статус: " . $info['http_code'] . "\n";

if(curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}
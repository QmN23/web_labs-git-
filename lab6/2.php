<?php

// 1. GET-запрос с кастомными заголовками
$ch = curl_init();

// URL для GET-запроса
$url = 'https://jsonplaceholder.typicode.com/posts';

// Кастомные заголовки
$headers = [
    'Custom-header: SomeTextForCustomHeader '
];

// Устанавливаем URL
curl_setopt($ch, CURLOPT_URL, $url);

// Устанавливаем заголовки
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Устанавливаем VERIFYPEER чтобы не было проблемы с SSL сертификатом
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Устанавливаем RETURNTRANSFER, чтобы результат не выводился на экран, а возвращался в качестве переменной
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Выполняем запрос
$response = curl_exec($ch);

// Проверяем на ошибки
if (curl_errno($ch)) {
    echo 'Ошибка запроса: ' . curl_error($ch);
}

// Закрываем cURL-сессию
curl_close($ch);

echo "GET Response:\n$response\n";

// 2. POST-запрос с JSON-данными
$ch = curl_init();

// URL для POST-запроса
$url = 'https://jsonplaceholder.typicode.com/posts';

// Данные для отправки
$data = [
    'title' => 'Text',
    'body' => 'TTExxtt',
    'userId' => 1
];

// Преобразуем данные в JSON
$jsonData = json_encode($data);

// Кастомные заголовки
$headers = [
    'Content-Type: application/json'
];

// Устанавливаем URL
curl_setopt($ch, CURLOPT_URL, $url);

// Устанавливаем метод POST
curl_setopt($ch, CURLOPT_POST, true);

// Устанавливаем тело запроса
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

// Устанавливаем VERIFYPEER чтобы не было проблемы с SSL сертификатом
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Устанавливаем заголовки
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Устанавливаем RETURNTRANSFER, чтобы результат не выводился на экран, а возвращался в качестве переменной
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Выполняем запрос
$response = curl_exec($ch);

// Проверяем на ошибки
if (curl_errno($ch)) {
    echo 'Ошибка запроса: ' . curl_error($ch);
}

// Закрываем cURL-сессию
curl_close($ch);

echo "POST response: " . $response . "\n";

// 3. GET-запрос с параметрами URL
$ch = curl_init();

// URL для GET-запроса с параметрами
$url = 'https://jsonplaceholder.typicode.com/posts';

// Параметры для URL
$params = [
    'userId' => 1
];

// Строим строку параметров
$str = http_build_query($params);
$urlWithParams = $url . '?' . $str;

// Устанавливаем URL с параметрами
curl_setopt($ch, CURLOPT_URL, $urlWithParams);

// Устанавливаем RETURNTRANSFER, чтобы результат не выводился на экран, а возвращался в качестве переменной
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Устанавливаем VERIFYPEER чтобы не было проблемы с SSL сертификатом
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Выполняем запрос
$response = curl_exec($ch);

// Проверяем на ошибки
if (curl_errno($ch)) {
    echo 'Ошибка запроса: ' . curl_error($ch);
}

// Закрываем cURL-сессию
curl_close($ch);



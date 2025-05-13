<?php

// Указываем URL для запроса
$url = 'https://jsonplaceholder.typicode.com/posts';

$ch = curl_init();  // Инициализация cURL

// Настройка cURL
// Устанавливаем VERIFYPEER чтобы не было проблемы с SSL сертификатом
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPGET, true);

$response = curl_exec($ch);  // Выполнение запроса

// Проверка на ошибки cURL
if(curl_errno($ch)) {
    echo 'Ошибка cURL: ' . curl_error($ch);  // Вывод ошибки cURL
    curl_close($ch);
    exit;  // Прерываем выполнение, если произошла ошибка cURL
}

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  // Получаем HTTP код ответа
curl_close($ch);  // Закрываем сессию cURL

// Обработка ответа в зависимости от HTTP кода
if ($http_code == 200) {
    // Парсим JSON, если ответ успешный (HTTP 200)
    $data = json_decode($response);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'Ошибка при декодировании JSON: ' . json_last_error_msg();  // Вывод ошибки парсинга
        exit;
    }

    // Выводим данные
    print_r($data);
} else {
    // Обработка ошибок HTTP (например, код 4xx, 5xx)
    echo 'Ошибка HTTP: ' . $http_code . "\n";
    if ($http_code >= 400 && $http_code < 500) {
        echo 'Клиентская ошибка (4xx).';
    } elseif ($http_code >= 500 && $http_code < 600) {
        echo 'Ошибка сервера (5xx).';
    }
}
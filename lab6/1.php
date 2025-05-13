<?php

// GET-запрос
// Инициация cURL-сеанса
$url = "https://jsonplaceholder.typicode.com/posts";
$ch = curl_init($url);


// Устанавливаем URL-адрес
curl_setopt($ch, CURLOPT_URL, $url);

// Передаем страницу браузеру
$ex = curl_exec($ch);

//Закрываем
curl_close($ch);
echo "GET Response:\n$ex\n\n";
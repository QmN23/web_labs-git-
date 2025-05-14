<?php
class ApiClient
{
    private string $apiUrl;
    private array $defaultHeaders = [];

    public function __construct(string $endUrl, string $login, string $pass)
    {
        $this->apiUrl = rtrim($endUrl, '/');
        $this->defaultHeaders[] = "Accept: application/json";
    }

    // Метод отправки HTTP-запросов.
    private function request(string $urlPath, string $httpMethod, array $body = []): array
    {
        $url = "{$this->apiUrl}/" . ltrim($urlPath, '/'); // Полный URL запроса
        $ch = curl_init($url); // Инициализируем cURL

        // Базовые настройки cURL
        $config = [
            CURLOPT_RETURNTRANSFER => true, // Возвращать результат вместо вывода
            CURLOPT_CUSTOMREQUEST => $httpMethod, // Метод запроса
            CURLOPT_SSL_VERIFYPEER => false, // Без проблем с SSL сертификатом
            CURLOPT_HTTPHEADER => $this->defaultHeaders, // Заголовки
        ];

        // Если передан массив данных (например, для POST или PUT)
        if ($body !== null) {
            $jsonBody = json_encode($body); // Преобразуем массив в JSON
            $config[CURLOPT_POSTFIELDS] = $jsonBody; // Устанавливаем тело запроса
        }

        curl_setopt_array($ch, $config);

        // Выполняем запрос
        $output = curl_exec($ch);

        // Получаем код ответа HTTP (200, 404, и т.д.)
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Получаем ошибку, если она есть
        $failReason = curl_error($ch);
        curl_close($ch); // Закрываем соединение

        // Возвращаем массив с результатами
        return [
            'http_code' => $httpStatus,
            'response' => json_decode($output, true), // Преобразуем JSON в массив
            'error_message' => $failReason ?: null,
        ];
    }

    // Отправка GET-запроса
    public function GET(string $path): array
    {
        return $this->request($path, 'GET');
    }

    // Отправка POST-запроса с телом
    public function POST(string $path, array $payload): array
    {
        return $this->request($path, 'POST', $payload);
    }

    // Отправка PUT-запроса с телом
    public function PUT(string $path, array $payload): array
    {
        return $this->request($path, 'PUT', $payload);
    }

    // Отправка DELETE-запроса
    public function DELETE(string $path): array
    {
        return $this->request($path, 'DELETE');
    }
}

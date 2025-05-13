<?php
// Подключение к серверу MySQL
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');

if (mysqli_connect_errno()) {
    printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);
    $title = $mysqli->real_escape_string($_POST['title']);
    $category = $mysqli->real_escape_string($_POST['category']);
    $description = $mysqli->real_escape_string($_POST['description']);

    $query = "INSERT INTO ad (email, title, description, category) VALUES ('$email', '$title', '$description', '$category')";
    $mysqli->query($query);
}

$advertisements = [];
if ($result = $mysqli->query('SELECT * FROM ad ORDER BY created DESC')) {
    while ($row = $result->fetch_assoc()) {
        $advertisements[] = $row;
    }
    $result->close();
}
$mysqli->close();
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bulletin Board</title>
</head>
<body>
    <div>
    <form method="post">
        <label for="Email">Email</label>
        <input type="email" name="email" required><br>
        <label for="category">Категория</label>
        <select name="category" required>
            <option>Мода</option>
            <option>Украшения</option>
            <option>Аксессуары</option>
        </select><br><br>
        <label for="title">Заголовок</label>
        <input type="text" name="title" required><br><br>

        <label for="description">Описание</label>
        <textarea rows="10" name="description"></textarea>

        <label>
            <input type="submit" value="save">
        </label>
    </form>
</div>
    <div id="table">
        <table>
            <thead>
            <th>Категория</th>
            <th>Заголовок</th>
            <th>Описание</th>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>
</html>
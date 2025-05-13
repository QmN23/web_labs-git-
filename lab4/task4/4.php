<?php
session_start();

// Сохраняем введённые данные в сессию
$_SESSION['project_name'] = $_POST['project_name'];
$_SESSION['deadline'] = $_POST['deadline'];
$_SESSION['budget'] = $_POST['budget'];

// Перенаправляем на вывод
header("Location: index.php");
exit;
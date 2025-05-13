<?php
session_start();

if (isset($_SESSION['project_name'])) {
    echo "<h2>Информация о проекте:</h2>";
    echo "<p><strong>Название:</strong> " . ($_SESSION['project_name']) . "</p>";
    echo "<p><strong>Сроки:</strong> " . ($_SESSION['deadline']) . "</p>";
    echo "<p><strong>Бюджет:</strong> " . ($_SESSION['budget']) . "</p>";
}


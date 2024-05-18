<?php
session_start();

// Подключение к базе данных (замените данными своей базы данных)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";


$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$name = $_POST['name'];
$email = $_POST['email'];
$details = $_POST['details'];
$style = $_POST['style'];
$deadline = $_POST['deadline'];

// Подготовка и выполнение SQL-запроса
$sql = "INSERT INTO custom_orders (name, email, details, style, deadline) VALUES ('$name', '$email', '$details', '$style', '$deadline')";

if ($conn->query($sql) === TRUE) {
    echo "Заявка успешно добавлена!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрытие подключения
$conn->close();
?>

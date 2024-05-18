<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Данные успешно добавлены в базу данных";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

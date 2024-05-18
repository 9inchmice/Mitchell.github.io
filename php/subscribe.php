<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, был ли отправлен email
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        // Проверяем, не подписан ли уже этот email
        $check_query = "SELECT * FROM subscribers WHERE email='$email'";
        $result = $conn->query($check_query);
        
        if ($result->num_rows > 0) {
            echo "Этот email уже подписан на обновления.";
        } else {
            // Сохраняем email в базе данных
            $insert_query = "INSERT INTO subscribers (email) VALUES ('$email')";
            if ($conn->query($insert_query) === TRUE) {
                echo "Вы успешно подписались на обновления!";
            } else {
                echo "Ошибка: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>

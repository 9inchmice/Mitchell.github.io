<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $row["role"];
            header("Location: index.php");
            exit();
        } else {
            echo "Неверный пароль.";
        }
    } else {
        echo "Пользователь не найден.";
    }
}
?>
<head>
<link rel="stylesheet" href="css/admin.css" />
<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* This ensures the content is centered vertically */
    margin: 0;
    padding: 0;
}
</style>
</head>
<!-- Форма входа в систему в HTML -->
<form method="post" action="">
    <input type="text" name="username" placeholder="Имя пользователя" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <input type="submit" name="login" value="Войти">
</form>

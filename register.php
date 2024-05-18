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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Handle user registration
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    // Add additional validation and security measures as needed
    
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/styles.css">
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
<body>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Имя пользователя" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <input type="submit" name="register" value="Зарегистрироваться">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Fetch existing data for editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    $sql = "SELECT * FROM artworks WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image = $row["image"];
        $title = $row["title"];
        $price = $row["price"];
        $description = $row["description"];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $image = $_POST["image"];
    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    $sql = "INSERT INTO artworks (image, title, price, description) VALUES ('$image', '$title', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Работа успешно добавлена.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM artworks WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Работа успешно удалена.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    $sql = "UPDATE artworks SET title='$title', price='$price', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Данные успешно обновлены.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/styles.css">
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .artwork {
            margin-bottom: 40px;
        }
        .artwork h2 {
            margin-bottom: 10px;
            text-align: center;
        }
        .artwork form {
            text-align: center;
        }
        .artwork input[type="text"],
        .artwork input[type="number"],
        .artwork textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .artwork input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }
        .artwork input[type="submit"]:hover {
            background-color: #45a049;
        }
        .artwork img {
            display: block;
            margin: 0 auto 10px;
            max-width: 100%;
            height: auto;
        }
        .artwork p {
            text-align: center;
        }
        .orders {
    margin-top: 40px;
}

.order {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #f9f9f9; /* Background color for orders */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Box shadow for a slight elevation effect */
}

.order p {
    margin: 10px 0; /* Increased margin between paragraphs */
}

.order h3 {
    margin-bottom: 15px; /* Increased margin below order headings */
    color: #333; /* Heading color */
}

.order-details {
    margin-top: 10px; /* Top margin for order details */
    font-size: 0.9em; /* Decreased font size for order details */
    color: #666; /* Color for order details */
}

.order-details span {
    font-weight: bold; /* Make detail labels bold */
    color: #333; /* Color for detail labels */
}
</style>
</head>
<body>
    <div class="container">
    <h1>Админ-панель</h1>

        <div class="artwork">
            <h2>Добавить работу</h2>
            <form method="post" action="">
                <input type="text" name="image" placeholder="URL изображения" required><br>
                <input type="text" name="title" placeholder="Заголовок" required><br>
                <input type="text" name="price" placeholder="Цена" required><br>
                <textarea name="description" placeholder="Описание" required></textarea><br>
                <input type="submit" name="add" value="Добавить">
            </form>
        </div>

        <div class="artwork">
            <h2>Редактировать работу</h2>
            <form method="post" action="">
                <input type="number" name="id" placeholder="ID работы" required><br>
                <?php if(isset($image)) echo "<img src='$image' alt='Artwork Image'><br>"; ?>
                <input type="text" name="title" placeholder="Новый заголовок" value="<?php if(isset($title)) echo $title; ?>"><br>
                <input type="text" name="price" placeholder="Новая цена" value="<?php if(isset($price)) echo $price; ?>"><br>
                <textarea name="description" placeholder="Новое описание"><?php if(isset($description)) echo $description; ?></textarea><br>
                <input type="submit" name="edit" value="Редактировать">
            </form>
        </div>

        <div class="artwork">
            <h2>Удалить работу</h2>
            <form method="post" action="">
                <input type="number" name="id" placeholder="ID работы" required><br>
                <input type="submit" name="delete" value="Удалить">
            </form>
        </div>

        <div class="artwork">
            <h2>Все работы</h2>
            <?php
            $sql = "SELECT * FROM artworks";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<p>";
                    echo "<img src='" . $row['image'] . "' alt='Artwork Image'><br>";
                    echo "Заголовок: " . $row['title'] . "<br>";
                    echo "Цена: " . $row['price'] . "<br>";
                    echo "Описание: " . $row['description'];
                    echo "</p>";
                }
            } else {
                echo "Нет работ для отображения";
            }
            ?>
        </div>
    <div class="orders">
        <h2>Заказы</h2>
        <div class="order">
    <?php
    $sql_orders = "SELECT * FROM custom_orders";
    $result_orders = $conn->query($sql_orders);
    if ($result_orders->num_rows > 0) {
        while($row_order = $result_orders->fetch_assoc()) {
            echo "<p>";
            echo "Имя: " . $row_order['name'] . "<br>";
            echo "Email: " . $row_order['email'] . "<br>";
            echo "Детали: " . $row_order['details'] . "<br>";
            echo "Стиль: " . $row_order['style'] . "<br>";
            echo "Крайний срок: " . $row_order['deadline'] . "<br>";
            echo "Дата заказа: " . $row_order['timestamp'];
            echo "</p>";
        }
    } else {
        echo "Нет заказов для отображения";
    }
    ?>
    </div>
</div>

    
    </body>
</html>

<?php
$conn->close();
?>

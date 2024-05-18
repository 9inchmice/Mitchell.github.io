<?php
session_start();

// Подключение к базе данных
$mysqli = new mysqli("localhost", "root", "", "gallery");

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}

$errors = array();

// Обработка отправленного отзыва
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];

    // Валидация данных
    if (empty($name)) {
        $errors[] = "Введите имя.";
    }
    if (empty($comment)) {
        $errors[] = "Введите комментарий.";
    }
    if (empty($rating) || !is_numeric($rating) || $rating < 1 || $rating > 5) {
        $errors[] = "Укажите оценку от 1 до 5.";
    }

    if (empty($errors)) {
        // Подготовка и выполнение SQL запроса для сохранения отзыва
        $stmt = $mysqli->prepare("INSERT INTO reviews (name, comment, rating) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $name, $comment, $rating);
        $stmt->execute();
        $stmt->close();
    }
}

// Запрос на получение всех отзывов из базы данных
$result = $mysqli->query("SELECT name, comment, rating, created_at FROM reviews ORDER BY created_at DESC");

// Функция для вывода отзывов
function displayReviews($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='review'>";
            echo "<h3>{$row['name']}</h3>";
            echo "<p>{$row['comment']}</p>";
            echo "<p><strong>Оценка:</strong> {$row['rating']}</p>";
            echo "<p><em>Дата:</em> {$row['created_at']}</p>";
            echo "</div>";
        }
    } else {
        echo "Пока нет отзывов.";
    }
}
session_start();

$isLoggedIn = isset($_SESSION["username"]);

$isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] == "admin";

// Вход и выход
if (isset($_SESSION["username"])) {
    echo '<a href="logout.php">Выйти</a>';
} else {
    echo '<a href="login.php">Войти</a>';
}

// Кнопка панели админа
if ($isAdmin) {
    echo '<a href="admin_panel.php">Панель админа</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Отзывы</title>
  </head>
  <style>
   nav {
            padding-left: 17px; /* Ширина scrollbar на Windows */
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: var(--primary-color);
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        body {
            background-color: var(--extra-light);
        }

        form input[type="submit"]:hover {
            background-color: var(--primary-color-dark);
        }

        .review {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .review h3 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .review p {
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .review em {
            color: var(--text-light);
        }

        form {
            margin-top: 60px;
            text-align: center; /* Центрирование содержимого формы */
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left; /* Выравнивание текста меток слева */
        }

        .section__container {
            max-width: var(--max-width);
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--extra-light);
        }

        .content {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: var(--extra-light);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .title {
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        form label {
            margin-bottom: 10px;
            font-weight: bold;
            text-align: center;
        }

        form input[type="text"],
        form textarea,
        form input[type="number"],
        form input[type="submit"] {
            width: calc(100% - 40px);
            max-width: 400px;
            margin: 0 auto;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .reviews {
            justify-content: center;
        }

        .review {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .review h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .review p {
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .review em {
            color: var(--text-light);
        }
        
        footer {
            background-color: #f5f5f5;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        footer {
    padding-left: 17px; /* Ширина scrollbar на Windows */
    box-sizing: border-box;
}
        footer p {
            font-size: 14px;
        }

        .title {
	  margin-top: 0rem;
        font-size: 36px;
        font-weight: 600;
		line-height: 1.;
        color: var(--text-dark);
        margin-bottom: 1rem;
      }
      .description {
        font-size: 20px;
        line-height: 1.8em;
        color: var(--text-light);
        margin-bottom: 1.5rem;
      }
      .description a {
        font-size: 20px;
        line-height: 1.8em;
        color: var(--primary-color);
        margin-bottom: 1.5rem;
      }
      body  {
            text-align: justify; /* Выравнивание текста по ширине */

        }
</style>
<body>
<nav>
      <div class="nav__content">
        <div class="logo"><a href="index.php">Mitchell</a></div>
        
        <label for="check" class="checkbox">
        <i class="ri-menu-line"></i>

        </label>
        
        <input type="checkbox" name="check" id="check" />
        <ul>
        <li><a href="index.php">Главная</a></li>
                <li><a href="about-me.php">Обо мне</a></li>
                <li><a href="gallery.php">Галерея</a></li>
                <li><a href="events.php">Мероприятия</a></li>
                <li><a href="reviews.php">Отзывы</a></li>
                <li><a href="contact.php">Связаться со мной</a></li>
                <?php
                if ($isLoggedIn) {
                  echo '<li><a href="custom_order.php">Картина на заказ </a></li>';

                    echo '<li><a href="logout.php">Выйти</a></li>';
                    if ($isAdmin) {
                        echo '<li><a href="admin.php">Панель админа</a></li>';
                    }
                } else {
                    echo '<li><a href="login.php">Войти</a></li>';
                    echo '<li><a href="register.php">Регистрация</a></li>';
                }
                ?>
            </ul>
        </ul>
      </div>
    </nav>
    <section class="section__container">
        <div class="content">

        <form action="reviews.php" method="post">
    <h1 class="title">Отзывы о картинах</h1>

    <?php if ($isLoggedIn): ?>
        <!-- Форма для отзыва -->
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>

        <label for="comment">Комментарий:</label>
        <textarea id="comment" name="comment" required></textarea>

        <label for="rating">Оценка (от 1 до 5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required>

        <input type="submit" class="submit-button" value="Оставить отзыв">
    <?php else: ?>
        <!-- Сообщение о необходимости войти -->
        <p class="description">Чтобы оставить отзыв, пожалуйста, <a href="login.php">войдите</a>.</p>
    <?php endif; ?>
</form>


            <!-- Отображение существующих отзывов -->
            <div class="reviews">
                <?php displayReviews($result); ?>
            </div>
        </div>
    </section>
    <footer>
    <p>&copy; 2024 Mitchell. Все права защищены.</p>
</footer>
</body>
</html>

<?php
// Закрытие соединения с базой данных
$mysqli->close();
?>

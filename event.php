<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Функция для получения имени пользователя из сессии
function getUsername() {
    return isset($_SESSION["username"]) ? $_SESSION["username"] : "Гость";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выставка</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>

			nav {
    padding-left: 17px; /* Ширина scrollbar на Windows */
    box-sizing: border-box;
}
body {
    font-family: "Poppins", sans-serif;
    margin: 0;
    padding: 0;
    height: 2600px;
    background-color: #faf5ff;
    color: var(--text-dark);
}



button {
  display: flex;
  gap: 1rem;
}

button {
  font-size: 1rem;
  font-weight: 600;
  letter-spacing: 2px;
  padding: 1rem 2rem;
  outline: none;
  border: 2px solid var(--primary-color);
  border-radius: 10px;
  transition: 0.3s;
  cursor: pointer;
  align-items: center;
}
nav ul li a:hover {
    color: var(--primary-color);
}

.main {
    padding: 40px;
}

.container {
    max-width: 1200px;
    margin: auto;
}

.event h1 {
    font-size: 2.5rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 20px;
}

.event p {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.event form input[type="text"],
.event form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    margin-left: 270px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.event form button {
    background-color: var(--primary-color);
    color: #fff;
    margin-left: 550px;

    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.event form button:hover {
    background-color: var(--primary-color-dark);
}

.comments {
    margin-top: 40px;
}

.comments h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 20px;
}

.comments ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.comments ul li {
    margin-bottom: 10px;
}

.comments ul li strong {
    font-weight: 600;
}



.comments ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column; /* Новый стиль для вертикального ряда */
    align-items: flex-start; /* Новый стиль для выравнивания элементов по левому краю */
}

.comments ul li {
    margin-bottom: 20px; /* Промежуток между комментариями */
}
img {
  display: block;
  margin: 150px auto 50px; /* 20px сверху, авто по горизонтали */


}
body  {
            text-align: justify; /* Выравнивание текста по ширине */

        }
    </style>
</head>
<body>
    <header>
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
            </div>
        </nav>
    </header>
    <main>
        <section class="event">
            <div class="container">
                <img src="assets/art-space.jpg" alt="Выставка">
                <h1>Выставка "Невероятный мир природы"</h1>
                <p>Место: Галерея искусств "Экспозиция", г. Нью-Йорк, США</p>
                <p>Дата: 15 мая 2024 года</p>
                <p>Для кого: Любители искусства, ценители природы</p>
                <p>На этой выставке представлены удивительные творческие работы, погружающие зрителя в захватывающий мир природы. Экспозиция включает в себя широкий спектр произведений, вдохновленных разнообразием природных явлений, таких как водоросли, лишайники, ржавчина и обветренные поверхности.</p>
                <p>Мои работы, созданные в технике машинной вышивки, представлены среди других творческих произведений. В каждом произведении заложено мое видение красоты природы, зафиксированное в изысканных деталях и уникальном исполнении.</p>
                <p>Эта выставка призвана не только вдохновить зрителей на новые творческие выражения, но и поделиться уважением к природе и ее удивительным явлениям. Это невероятная возможность встретиться с красотой природы через глаза художника и ощутить ее величие и вдохновение.</p>
                <!-- Отображение уже существующих комментариев -->
                <section class="comments">
                    <h2>Комментарии</h2>
                    <ul>
                        <?php
                        $sql = "SELECT * FROM comments";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<li><strong>" . $row["username"] . ":</strong> " . $row["comment"] . "</li>";
                            }
                        } else {
                            echo "<li>Пока нет комментариев.</li>";
                        }
                        ?>
<?php
// Проверяем, аутентифицирован ли пользователь
if ($isLoggedIn) {
    // Отображаем форму для комментариев только для аутентифицированных пользователей
    echo '
        <form name="commentForm" method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
            <input type="text" name="username" placeholder="Ваше имя" required><br>
            <textarea name="comment" placeholder="Напишите ваш комментарий" required></textarea><br>
            <button type="submit">Отправить</button>
        </form>
    ';
} else {
    // Если пользователь не аутентифицирован, показываем сообщение о необходимости войти или зарегистрироваться
    echo '<p>Чтобы оставить комментарий, пожалуйста, <a href="login.php">войдите</a> или <a href="register.php">зарегистрируйтесь</a>.</p>';
}
?>                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST["username"];
                        $comment = $_POST["comment"];

                        // Здесь можно добавить проверки на валидность данных, прежде чем вставлять их в базу данных

                        $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
                        if ($conn->query($sql) === TRUE) {
                            // После успешного добавления комментария, можно перенаправить пользователя на эту же страницу,
                            // чтобы избежать повторной отправки формы при обновлении страницы
                            exit();
                        } else {
                            echo "Ошибка при добавлении комментария: " . $conn->error;
                        }
                    }
                    ?>
                </section>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Mitchell. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
// Закрываем соединение с базой данных
$conn->close();

// Выводим сообщение о успешном добавлении комментария
if (isset($_SESSION['comment_added']) && $_SESSION['comment_added'] === true) {
    echo "Комментарий успешно добавлен.";
    unset($_SESSION['comment_added']); // Очищаем флаг
}
?>

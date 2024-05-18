<?
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/contact.css">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <style>
     .section {
        text-align: justify;
     }
        body {
  overflow: hidden; /* Запрещаем скролл для всей страницы */
}@media (max-width: 768px) {
            .gallery {
                margin-top: 0;
            }
            .title {
                margin-top: 33px;
            }
body {
	  overflow-y: auto; /* Добавляем вертикальный скролл при необходимости */
}
}</style>
    <title>Связаться со мной</title>
</head>
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
    <section class="section">
        <div class="section__container">
            <div class="content">
                <h1 class="title">Свяжитесь со мной</h1>
                <p class="description">Заполните форму ниже, чтобы отправить мне сообщение.</p>
                
                <form action="php/process_form.php" method="post">
                    <label for="name">Имя:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Сообщение:</label>
                    <textarea id="message" name="message" required></textarea>

                    <input type="submit" class="submit-button" value="Отправить">
                </form>
            </div>
			<section class="map">
<div class="map-container">
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A71a2876ee72a922fe709ea73dd5f93648a9b43b3668597e417a0ba673949c512&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script></div>

</section>

        </div>

    </section>
	    <footer>
        <p>&copy; 2024 Mitchell. Все права защищены.</p>
</footer>
    <script src="js/script.js">    </script>

</body>
</html>

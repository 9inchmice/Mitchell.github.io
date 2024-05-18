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
    <meta name="description" content="Портфолио молодого художника. Визуализация творческих работ с использованием различных материалов и стилей.">
<meta name="keywords" content="художник, портфолио, искусство, творчество">
<meta name="author" content="Имя Художника">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/contact.css">
<style>
    body {
        overflow: hidden; /* Изменяем overflow на auto */
  
}
p {
    text-align: justify; /* Выравнивание текста по ширине */
    
}

.section__container {

display: flex;
justify-content: center;
align-items: center;
margin-bottom: 60px;
}

@media (max-width: 768px) {
            .gallery {
                margin-top: 0;
            }
            .title {
                margin-top: 0px;
            }
body {
	  overflow-y: auto; /* Добавляем вертикальный скролл при необходимости */
}
}
</style>
    <title>Картина на заказ</title>
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
        </div>
    </nav>
    <section class="section">
        <div class="section__container">
            <div class="content">
                <h1 class="title">Заказать уникальное произведение искусства</h1>
                <p class="description">Оставьте заявку на уникальную картину, и я свяжусь с вами для обсуждения деталей.</p>
                <form action="php/process_custom_order.php" method="post" enctype="multipart/form-data">
    <label for="name">Ваше имя:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Ваш Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="details">Опишите, что вы хотели бы видеть в картинах:</label>
    <textarea id="details" name="details" required></textarea>

    <label for="style">Предпочитаемый стиль (если есть):</label>
    <input type="text" id="style" name="style">

    <label for="deadline">Сроки (если есть конкретные):</label>
    <input type="date" id="deadline" name="deadline">


    <label for="image_upload">Загрузите изображение для вдохновения:</label>
    <input type="file" id="image_upload" name="image_upload[]" accept="image/*" multiple>

    <input type="submit" class="submit-button" value="Отправить заявку"><br><br>
</form>

            </div>
        </div>  
    </section>
    <footer>
        <p>&copy; 2024 Mitchell. Все права защищены.</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>

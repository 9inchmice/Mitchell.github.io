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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Mitchell</title>
    <style>
        
        body {
  overflow: hidden; /* Запрещаем скролл для всей страницы */
  text-align: justify; /* Выравнивание текста по ширине */

}
        	@media (max-width: 768px) {
				.image {
					margin-top: -50px;
				}
                
				.event {
					width: 100%; /* Устанавливаем ширину 100% для карточек на узких экранах */
				margin-bottom: 1rem; /* Добавляем промежуток между карточками на узких экранах */
				box-sizing: border-box;
			}
            @media (max-width: 768px) {
            .gallery {
                margin-top: 0;
            }
            .title {
                margin-top: 33px;
            }
body {
	  overflow-y: auto; /* Добавляем вертикальный скролл при необходимости */
}
}
            </style>
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
                <h1 class="title">
                    <span>Художник текстиля, работающий в Корнуолле<br /></span>
                </h1>
                <p class="description">
                    Мишель Смит, талантливый художник с неповторимой техникой, вдохновленный своими экспериментами с материалами, красками и машинной вышивкой. Её нежные наблюдения за красотами корнуолльского пейзажа неизбежно приковывают ваше внимание, приглашая вас в удивительный мир её искусства.
                </p>
                <div class="action__btns">
                    <button class="hire__me" onclick="window.location.href='about-me.php'">Обо мне</button>
                    <button class="portfolio" onclick="window.location.href='gallery.php'">Галерея</button>
                </div>
            </div>
            <div class="image">
                <img src="assets/profile.jpg" alt="profile" />
            
                </div>
        </div>
        <div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h2>Подпишитесь на обновления</h2>
    <form id="subscribeForm" action="php/subscribe.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Ваш email" required>
        <button type="submit">Подписаться</button>
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

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

	!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE-чего то больше">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/styles.css">
			    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
		<title>Мероприятия</title>
		<style>
			      body  {
            text-align: justify; /* Выравнивание текста по ширине */

        }
			nav {
    padding-left: 17px; /* Ширина scrollbar на Windows */
    box-sizing: border-box;
}
footer {
    padding-left: 17px; /* Ширина scrollbar на Windows */
    box-sizing: border-box;
}

body, html {
    height: 100%;
    margin: 0;
    padding: 0;
}

.section__container {

    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 60px;
}

.events {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 2rem;
    max-width: 1200px;
    width: 100%;
}


.events {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 2rem;
    margin-top: 100px;
}

.event {
    width: 100%;
    max-width: 800px; /* Опционально: ограничиваем максимальную ширину события */
    background-color: #faf5ff;
    border: 1px solid #ccc;
    padding: 1rem;
    border-radius: 5px;
    box-sizing: border-box;
    text-align: center; /* Выравниваем текст по центру */
}

.event img {
    max-width: 100%;
    height: auto; /* Опционально: автоматически регулируем высоту изображения */
    margin-bottom: 1rem; /* Добавляем небольшой отступ между изображением и текстом */
}

.event-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-dark);
}

.event-date {
    color: var(--text-light);
}

.event-description {
    color: var(--text-dark);
    margin-top: 1rem;
}

.contact__button {
    display: block;
    margin: 0 auto;
    padding: 10px 20px;
    background-color: var(--primary-color);
    color: #fff;
    font-size: 1rem;
    font-weight: 600;
    border: none;
    width: 300px;
    height: 50px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.contact__button:hover {
    background-color: var(--primary-color-dark);
}

@media (max-width: 768px) {
    .events {
        margin-top: 0; /* Убираем верхний отступ на узких экранах */
    }
}

			
		</style>
	</head>
	<body>
	   <nav>
		  <div class="nav__content">
			<div class="logo"><a href="index.html">Mitchell</a></div>
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
					<div class="events">
						<!-- Карточка 1 - Прошлая выставка -->
						<!-- Карточка 1 - Выставка текстильных произведений -->
<div class="event">
  <h2 class="event-title">Выставка текстильных произведений</h2>
  <p class="event-date">Дата: 15 апреля 2023</p>
  <p class="event-description">Приглашаю вас на выставку моих текстильных работ, где вы сможете насладиться миром цветов и форм, созданных моими руками. Вход бесплатный.</p>
  <img src="assets/art-space.jpg" alt="Изображение моих текстильных работ на выставке">
	<button onclick="redirectToEventPage()" class="contact__button">Подробнее</button>
	<script>
    function redirectToEventPage() {
        window.location.href = 'event.php';
    }
</script>

</div>

<!-- Карточка 2 - Мастер-класс "Живопись и текстиль" -->
<div class="event">
  <h2 class="event-title">Мастер-класс "Живопись и текстиль"</h2>
  <p class="event-date">Дата: 2 мая 2023</p>
  <p class="event-description">Присоединяйтесь к моему мастер-классу, где я поделюсь с вами секретами живописи и творчества с использованием текстиля. Регистрация обязательна, количество мест ограничено.</p>
  <img src="assets/art-space2.jpg" alt="Изображение моих работ на мастер-классе">
	<button onclick="redirectToEventPage()" class="contact__button">Подробнее</button>

</div>

<!-- Карточка 3 - Предстоящая выставка "Цветочные миры" -->
<div class="event">
  <h2 class="event-title">Предстоящая выставка "Цветочные миры"</h2>
  <p class="event-date">Дата: 20 июня 2023</p>
  <p class="event-description">Не пропустите мои новые творческие работы на выставке "Цветочные миры". Это будет увлекательное погружение в мир цветов и искусства.</p>
  <img src="assets/1.jpg" alt="Изображение моих работ на предстоящей выставке">
	<button onclick="redirectToEventPage()" class="contact__button">Подробнее</button>

</div>

<!-- Карточка 4 - Летний арт-кемп для детей -->
<div class="event">
  <h2 class="event-title">Летний арт-кемп для детей</h2>
  <p class="event-date">Дата: 10-15 июля 2023</p>
  <p class="event-description">Приглашаю ваших детей на летний арт-кемп, где они смогут раскрасить свой творческий потенциал и создать собственные произведения искусства. Регистрация уже открыта.</p>
  <img src="assets/art-space4.jpg" alt="Изображение арт-кемпа для детей">
	<button onclick="redirectToEventPage()" class="contact__button">Подробнее</button>

</div>

<!-- Карточка 5 - Предстоящий мастер-класс "Акварель и текстиль" -->
<div class="event">
  <h2 class="event-title">Предстоящий мастер-класс "Акварель и текстиль"</h2>
  <p class="event-date">Дата: 5 сентября 2023</p>
  <p class="event-description">Приглашаю вас на мой предстоящий мастер-класс, где мы совместим акварель и текстиль, создавая удивительные произведения искусства. Будет интересно!</p>
  <img src="assets/art-space5.jpg" alt="Изображение мастер-класса">
	<button onclick="redirectToEventPage()" class="contact__button">Подробнее</button>

</div>

			</div>
		</section>

		<!-- Футер -->
		<footer>
        <p>&copy; 2024 Mitchell. Все права защищены.</p>
		</footer>

		<script src="js/script.js"></script>
	</body>
	</html>

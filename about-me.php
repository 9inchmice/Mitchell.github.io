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
ы
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
	    <link rel="stylesheet" href="css/about-me.css" />
<style>
  body {
  overflow: hidden; /* Запрещаем скролл для всей страницы */
  text-align: justify; /* Выравнивание текста по ширине */

}
  	@media (max-width: 768px) {
				.image {
					margin-top: 30px;
				}
				.event {
					width: 100%; /* Устанавливаем ширину 100% для карточек на узких экранах */
				margin-bottom: 1rem; /* Добавляем промежуток между карточками на узких экранах */
				box-sizing: border-box;
			}
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
    <title>Обо мне</title>
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
          <h1 class="title">
            <span>Здравствуйте, я Мишель Смит. Я художница по текстилю и живописец, живущий в Бодмин-Муре, Корнуолл. Мои работы тщательно собираются из слоев ткани и краски, которые соединяются вместе с помощью различных техник сшивания.          </p>
</span>
          </h1>
          <p class="description">
Меня вдохновляют сложные детали водорослей, лишайников, ржавчины и обветренных поверхностей. Мои работы невероятно сложны, я работаю над слоями и свариваю их вместе на швейной машине в течение многих недель.          </p>
<button onclick="window.location.href='contact.php'" class="contact__button">Связаться со мной</button>

        </div>
        <div class="slideshow-container image">
<img src="assets/artwork.jpg" alt="Пример работы 1" class="mySlides">
<img src="assets/artwork2.jpg" alt="Пример работы 2" class="mySlides">
<img src="assets/artwork3.jpg" alt="Пример работы 3" class="mySlides">

        </div>
      </div>
    </section>
	    <footer>
      <p>&copy; 2024 Mitchell. Все права защищены.</p>
</footer>
<script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds (2000ms)
  }
</script>
  </body>
</html>

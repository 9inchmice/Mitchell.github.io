
<?php
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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$sql = "SELECT * FROM artworks";
$result = $conn->query($sql);
$artworks = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $artworks[] = $row;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/2.5.0/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Галерея</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/adap.css">
    <style>
        body  {
            text-align: justify; /* Выравнивание текста по ширине */

        }
    .image-info {
            background-color: rgba(0, 0, 0, 0.7); /* Цвет фона с прозрачностью */
            color: white; /* Цвет текста */
            padding: 10px; /* Внутренние отступы */
            position: absolute; /* Абсолютное позиционирование для наложения поверх изображения */
            bottom: 0; /* Размещение внизу блока изображения */
            left: 0; /* Размещение влево блока изображения */
            width: 100%; /* Ширина блока */
            box-sizing: border-box; /* Учитывать внутренние отступы и границы в расчете ширины */
            opacity: 0; /* Начальная прозрачность (0 - невидимый) */
            transition: opacity 0.3s ease; /* Плавное изменение прозрачности при наведении */
        }

        .gallery__item:hover .image-info {
            opacity: 1; /* Показывать информацию при наведении на изображение */
        }

        .gallery__item img {
            width: 100%; /* Ensure the image fills the entire width of its container */
            height: 100%; /* Allow the image to maintain its aspect ratio */
            display: block; /* Make sure the image is displayed as a block element */
            object-fit: cover; /* Ensure the image covers the entire container */
        }

        .image-price, .image-description {
            color: white;
        }

        .social-sharing a {
            color: white;
            font-size: 24px;
            margin-right: 10px;
        }

        ul li a:hover {
            border-top-color: var(--secondary-color);
            border-bottom-color: var(--secondary-color);
            color: var(--secondary-color); /* Измените цвет текста при наведении */
        }

        ul li a:hover {
            border-top-color: #9333ea; /* Фиолетовый цвет */
            border-bottom-color: #9333ea; /* Фиолетовый цвет */
            color: #9333ea; /* Фиолетовый цвет текста при наведении */
        }

        .social-sharing a:hover {
            text-decoration: none;
        }

        * {
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            background-color: #faf5ff;
        }

        .gallery {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 90vh; /* Ensures the gallery takes at least the full viewport height */
            padding: 20px;
            background-color: #faf5ff;

        }

        .gallery__container {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            gap: 20px;
        }

        .gallery__item {
            position: relative;
            width: 300px; /* Fixed width */
            height: 350px; /* Fixed height */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            border-radius: 10px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #faf5ff;
        }

        .nav__content ul li {
            white-space: nowrap; /* Предотвращаем перенос слов на новую строку */
        }

        @media (max-width: 768px) {
            .gallery {
                margin-top: 0;
            }
            .title {
                margin-top: 33px;
            }
.description {
    margin-top: 20px;
}
            .gallery__container {
                flex-direction: column;
                align-items: center;
            }

            .gallery__item {
                width: 100%; /* Full width on small screens */
                max-width: 300px;
            }
        }

        .title {
	  margin-top: 3rem;
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
        </ul>
      </div>
    </nav>

    <div class="gallery">
    <h1 class="title">Галерея моих работ</h1>
    <p class="description">
Добро пожаловать в мою галерею! Здесь вы найдете мои последние произведения искусства, каждое из которых уникально и создано с любовью.</p>

        <div class="gallery__container">
            <?php foreach ($artworks as $artwork): ?>
                <div class="gallery__item">
                    <img src="<?php echo $artwork["image"]; ?>" alt="<?php echo $artwork["title"]; ?>" class="large-image" />
                    <div class="image-info">
                        <h3 class="image-title"><?php echo $artwork["title"]; ?></h3>
                        <p class="image-price">Цена: <?php echo $artwork["price"]; ?></p>
                        <p class="image-description"><?php echo $artwork["description"]; ?></p>
                        
                        <div class="social-sharing">

                        <a href="https://t.me/share/url?url=URL" target="_blank"><i class="ri-telegram-fill"></i></a>
</div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
	    <footer>
        <p>&copy; 2024 Mitchell. Все права защищены.</p>
</footer>
    <script src="script.js"></script>
</body>
</html>

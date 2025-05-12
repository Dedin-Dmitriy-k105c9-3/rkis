<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/system/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Roboto&display=swap" rel="stylesheet">
    <title>Библиотека «Грани Знаний»</title>
</head>
<?
  require_once('php/db.php');
  session_start();

  if (isset($_SESSION['cart'])) { // добавление товаров в корзину (после прекриейта)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      array_push($_SESSION['cart'], $_POST['id']);
    }
  }
?>
<body>
<header>
    <div class="container header-content">
      <div class="logo">
        <img src="img/logo.png">
        <h1>Библиотека «Грани Знаний»</h1>
        <nav>
  <ul class="d-flex align-items-center gap-3" style="list-style: none; margin: 0;">
    <li><a href="index.php">Главная</a></li>
    <li><a href="catalog.php">Каталог</a></li>
    <?php
      if (empty($_SESSION['auth'])) {
        echo '
        <li class="nav-item">
          <a class="nav-link" href="login.php">Профиль
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg>
          </a>
        </li>
        ';
      } else {
        echo '
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Профиль
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Корзина
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
              <path d="..."/>
            </svg>
          </a>
        </li>
        ';
      }
    ?>
  </ul>
</nav>
      </div>
    </div>
  </header>
<!-- HERO: Главный баннер -->
<section class="hero">
    <div class="container hero-content">
      <h2>Добро пожаловать в Библиотеку «Грани Знаний»</h2>
      <p>Погрузитесь в мир знаний и вдохновения</p>
      <!-- Кнопка "Узнать больше" ведёт к каталогу -->
      <a href="catalog.php" class="cta-btn">Узнать больше</a>
    </div>
  </section>
  
  <!-- ABOUT US: Раздел "О нас" -->
  <section class="about-us">
    <div class="container">
      <h2>О нас</h2>
      <p>
        Библиотека «Грани Знаний» – это центр культуры и саморазвития, где классика встречается с новейшими изданиями. Здесь проводятся литературные вечера, мастер-классы и встречи с авторами, позволяющие открыть новые горизонты знаний и вдохновения.
      </p>
    </div>
  </section>
    <!-- TESTIMONIALS: Секция с отзывами пользователей -->
    <section class="testimonials" id="testimonials">
    <div class="container">
      <h2>Отзывы наших читателей</h2>
      <div class="testimonial-cards">
        <div class="testimonial">
          <p>"Библиотека «Грани Знаний» стала для меня источником вдохновения. Здесь каждый найдет книгу по душе!"</p>
          <h4>Мария, дизайнер</h4>
        </div>
        <div class="testimonial">
          <p>"Прекрасное место для саморазвития. Книги здесь оживают, как воспоминания о детстве!"</p>
          <h4>Алексей, программист</h4>
        </div>
        <div class="testimonial">
          <p>"Это настоящий оазис знаний и культуры. Я не представляю свою жизнь без этой библиотеки!"</p>
          <h4>Елена, преподаватель</h4>
        </div>
      </div>
    </div>
  </section>
  

  <footer>
    <div class="container">
      <p>&copy; 2025 Библиотека «Грани Знаний». Все права защищены.</p>
      <p>Контакты: info@graniznaniy.ru | +7 (913) 991-06-45</p>
    </div>
  </footer>
</body>
<script src="js/bootstrap.min.js"></script>
</html>
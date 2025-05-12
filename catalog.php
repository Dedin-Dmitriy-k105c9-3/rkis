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
<?php
require_once('php/db.php');
session_start();

if (isset($_SESSION['cart'])) {
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

  <main>
    <section class="catalog">
      <div class="container">
        <h2>Каталог книг</h2>

        <!-- Форма поиска -->
        <form method="GET" action="catalog.php" class="d-flex flex-column align-items-center mb-4">
  <div class="w-100" style="max-width: 500px;">
    <input type="text" name="query" class="form-control mb-2" placeholder="Поиск по названию или автору..." value="<?= htmlspecialchars($_GET['query'] ?? '') ?>">
    <button type="submit" class="btn btn-primary w-100">Найти</button>
  </div>
</form>

<div class="row">
          <div class="card-container d-flex flex-wrap justify-content-start gap-4">
            <?php
              $query = $_GET['query'] ?? '';
              $query = trim($query);

              if (!empty($query)) {
                $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?");
                $search = '%' . $query . '%';
                $stmt->bind_param("ss", $search, $search);
                $stmt->execute();
                $result = $stmt->get_result();
              } else {
                $result = mysqli_query($conn, "SELECT * FROM products");
              }

              while ($n = mysqli_fetch_array($result)) {
                echo '<form class="card" method="post" action="';
                echo empty($_SESSION['cart']) ? 'php/precreate_cart.php" style="width: 18rem;">' : '#" style="width: 18rem;">';

                echo '
                  <div class="card-body d-flex flex-column align-items-center text-center">
                    <img src="img/'.$n['image'].'" style="height: 150px; width: 150px;" class="img-fluid rounded card-img-top mb-3" alt="Фото отсутствует">
                    <h5 class="card-title">'.$n['name'].'</h5>
                    <p class="card-text">'.$n['description'].'<br></p>
                    <p class="card-text">'.$n['cost'].' Руб.</p>';

                    if (empty($_SESSION['auth'])) {
                      echo '<a href="login.php" class="btn btn-primary">Добавить в корзину</a>';
                    } else {
                      echo '<button type="submit" name="id" value="'.$n['id'].'" class="btn btn-primary">Добавить в корзину</button>';
                    }

                echo '</div></form>';
              }
            ?>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2025 Библиотека «Грани Знаний». Все права защищены.</p>
      <p>Контакты: info@graniznaniy.ru | +7 (913) 991-06-45</p>
    </div>
  </footer>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/catalog.js"></script>
</body>
</html>
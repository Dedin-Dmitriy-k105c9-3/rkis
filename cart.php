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
  if (empty($_SESSION['auth'])) {
    Header('Location: index.php');
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // удаление товаров из корзины
    $cart = $_SESSION['cart'];
    $key = $_POST['delete'];
    unset($cart[$key]);
    $cart = array_values($cart); // ненужное (возобновляет порядок ключей в массиве)
    $_SESSION['cart'] = $cart;
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
  </ul>
</nav>
      </div>
    </div>
  </header>
    <main>
        <div class="container">
          <div class="row">
            <?
              if (empty($_SESSION['cart'])) {
                echo '
                <p class="h2 mt-5" style="text-align: center;">
                  Вы еще ничего не заказали
                </p>
                ';
              } else{
                foreach ($_SESSION['cart'] as $key => $id) {
                  $sql = "SELECT image, name, description, cost FROM `products` WHERE id = '$id'";
                  $n = mysqli_fetch_array(mysqli_query($conn, $sql));
                  echo '
                    <div class="card-container">
                      <div class="card col">
                        <div class="card-body">
                          <div class="d-flex">
                            <img src="img/'.$n['image'].'" style="width: 150px;" class="img-fluid rounded mb-3" alt="Фото отсутствует">
                            <div class="mt-0" style="margin-left: 1rem; margin-right: auto;">
                              <h5 class="card-title">'.$n['name'].'</h5>
                              <p class="card-text">'.$n['description'].'</p>
                              <p class="card-text">'.$n['cost'].'</p>
                            </div>
                            <div style="align-self: center;">
                              <form action="#" method="post">
                                <button name="delete" value="'.$key.'" type="submit" class="btn btn-danger">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                  </svg>
                                </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  ';
                } 
                echo '
                  </div>
                <form action="php/order.php" method="post">
                  <button type="submit" class="btn btn-success">Заказать</button>
                </form>
                ';
              }
            ?>
        </div>  
    </main>

    
    <footer>
    <div class="container">
      <p>&copy; 2025 Библиотека «Грани Знаний». Все права защищены.</p>
      <p>Контакты: info@graniznaniy.ru | +7 (913) 991-06-45</p>
    </div>
  </footer>
</body>
<script src="js/bootstrap.min.js"></script>
</html>
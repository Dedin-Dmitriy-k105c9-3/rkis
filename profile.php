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

  $id = $_SESSION['id'];

  $sql = "SELECT login, phone FROM `users` Where id = '$id'";
  $user = mysqli_fetch_array(mysqli_query($conn, $sql));
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
        <div class="my-2 d-flex justify-content-center">
          <div class="card" style="width: 25rem;">
            <div class="card-body">
              <h5 class="card-title"><?echo $user['login'];?></h5>
              <div style="display: flex; flex-wrap: wrap;">
                <p class="card-text me-auto">Телефон: <?echo $user['phone'];?></p>
              </div>
              <div class="mt-2 d-flex justify-content-center">
                <a href="php/exit.php">
                  <button type="button" class="btn btn-primary">
                    Выйти из аккаунта
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="card-container">
          <?
            $res = mysqli_query($conn, "SELECT * FROM `orders` where user_id = '$id'");

            $i = 1;

            while($n = mysqli_fetch_array($res)){
              $id_order = $n['id'];
              echo '
                <div class="card" style="width: 25rem;">
                  <div class="card-body">
                    <h5 class="card-title">Заказ №'.$i.'</h5>
                    <table class="table table-bordered">
                      <tr>
                        <td>
                          <p class="card-text">Что входит в заказ:</p>
                        </td>
                        <td>
                          <p class="card-text">';
                            $sql = mysqli_query($conn, "SELECT name FROM `order_product`, products where id_product = products.id and id_order = '$id_order';");
                            while ($l = mysqli_fetch_array($sql)) {
                              echo $l['name'], '<br>';
                            }
                          echo'
                          </p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p class="card-text">Итоговое кол-во:</p>
                        </td>
                        <td>
                          <p class="card-text">'.$n['quantity'].'</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p class="card-text">Итоговая цена:</p>
                        </td>
                        <td>
                          <p class="card-text">'.$n['total_cost'].'</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              ';
              $i++;
            }
            ?> 
        </div>
      </div>
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
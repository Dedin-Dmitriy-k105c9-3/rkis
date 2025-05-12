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

  if (isset($_SESSION['auth'])) {
    Header('Location: index.php');
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
    <main style="height: calc(100vh - 57px); display: flex; justify-content: center; align-items: center;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <?
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $login = $_POST['login'];
                  $password = $_POST['password'];
                  $sql = "SELECT id, role_id FROM `users` WHERE login = '$login' and password = '$password'";
                  
                  $result = $conn->query($sql);
                  if($result->num_rows == 1){
                    $result = mysqli_fetch_array(mysqli_query($conn, $sql));
                    session_start();
                    $_SESSION['auth'] = TRUE;
                    if($result['role_id'] == 1){
                      $_SESSION['admin'] = TRUE;
                      Header('Location: admin.php');
                    }else {
                      $_SESSION['id'] = $result['id'];
                      $_SESSION['cart'] = [];
                      Header('Location: profile.php');
                    }
                  }
                  else{
                    echo '<p class="h5 text-danger d-flex justify-content-center" style="text-transform: uppercase;">Неверные данные</p>';
                  }
                }
              ?>
                <form style="gap: 10px; display: flex; flex-direction: column;" action="#" method="post">
                    <p class="h3 card-title">Вход</p>
                    <input class="form-control" type="text" name="login" placeholder="Логин" maxlen="50" required>
                    <input class="form-control" type="password" name="password" placeholder="Пароль" maxlen="50" required>
                    <button href="#" class="btn btn-primary">Войти</button>
                    <div >
                        <a href="reg.php">Вы у нас впервые?</a>
                    </div>
                </form>
            </div>
          </div>
    </main>
    <footer>

    </footer>
</body>
<script src="js/bootstrap.min.js"></script>
</html>
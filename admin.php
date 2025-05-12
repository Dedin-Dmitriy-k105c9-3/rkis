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
  if (empty($_SESSION['admin'])) {
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
      <div class="card">
        <div class="card-body">
          <!-- <div class="card-title">
            <form>
              <div class="input-group mb-3">
                <input class="form-control" placeholder="Поиск по имени товара">
                <span class="input-group-text" id="basic-addon1">
                  <button class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                  </button>
                </span>
              </div>
            </form>
          </div> -->
          <table class="table table-hover table-bordered">
            <thead>
              <th>
                id
              </th>
              <th>
                name
              </th>
              <th>
                image
              </th>
              <th>

              </th>
            </thead>
            <tbody class="table-group-divider">
              <?
                $result = mysqli_query($conn, "SELECT * FROM `products`");

                while ($n = mysqli_fetch_array($result)){
                  echo '
                  <tr>
                    <td>
                      '.$n['id'].'
                    </td>
                    <td>
                      '.$n['name'].'
                    </td>
                    <td>
                      <img src="img/'.$n['image'].'" class="img-fluide" style="width: 50px;" alt="Фото отсутствует">
                    </td>
                    <td>
                      <a class="btn btn-danger" href="php/delete.php?id='.$n['id'].'">Удалить</a>
                    </td>
                  </tr>
                  ';
                }
              ?>
            </tbody>
          </table>
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
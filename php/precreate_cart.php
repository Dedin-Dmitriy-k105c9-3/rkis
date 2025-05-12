<?
    // используется один раз, когда в корзине пусто.

    session_start();
    $_SESSION['cart'] = [];
    $id = $_POST['id'];
    array_push($_SESSION['cart'], $_POST['id']);
    Header("Location: ../index.php")
?>
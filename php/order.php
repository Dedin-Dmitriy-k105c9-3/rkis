<?
    require_once('db.php');
    session_start();

    $total = 0; // блок подсчета стоимости всех продуктов
    foreach ($_SESSION['cart'] as $key => $id) {
        $sql = "SELECT cost FROM `products` WHERE id = '$id'";
        $n = mysqli_fetch_array(mysqli_query($conn, $sql));
        $total = $total + $n['cost'];
    }

    $quantity = count($_SESSION['cart']); // сколько товаров в корзине
    $id = $_SESSION['id'];

    $sql = "INSERT INTO `orders`(`user_id`, `quantity`, `total_cost`) VALUES ('$id','$quantity','$total')";
    $conn->query($sql); // Отправка данных заказа в базу

    $sql = "SELECT id FROM `orders` ORDER by 1 DESC;"; // узнаем id заказа который только что создали
    $result = mysqli_fetch_array(mysqli_query($conn, $sql));
    $order_id = $result['id'];

    foreach ($_SESSION['cart'] as $key => $id) { // добавляем данные о товарах и заказе в базу
        $sql = "INSERT INTO `order_product`(`id_order`, `id_product`) VALUES ('$order_id','$id')";
        $conn->query($sql);
    }

    $_SESSION['cart'] = []; // очистка корзины

    Header('Location: ../profile.php'); // ужас закончился
?>
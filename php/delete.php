<?
    require_once('db.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM `products` WHERE id = '$id'";
    mysqli_query($conn, $sql);

    Header('Location: ../admin.php');
?>
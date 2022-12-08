<?php
include 'connect.php';
$shop_name = $_SESSION['s_name'];

if(isset($_POST['delete'])) {
    $stmt = $conn->prepare("delete from meals where binary m_name = :m_name and shop_name = :shop_name");
    $stmt->execute(array('m_name' => $_POST['m_name'], 'shop_name' => $shop_name));
}
header('Location: shop.php');
?>
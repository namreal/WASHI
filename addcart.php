<?php
    require_once('./_private/bundle.php');
    $id = $_GET['id'];
     if(isset($_SESSION['cart'][$id])){
        $qty = $_SESSION['cart'][$id] + 1;
    } 
    else{
        $qty = 1;
    }
    $_SESSION['cart'][$id] = $qty;
    header('location: cart.php');
    exit;
?>
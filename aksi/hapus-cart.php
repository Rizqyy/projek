<?php
    session_start();
    unset($_SESSION['cart'][$_GET['ID']]);
    header("location:../keranjang.php");
?>
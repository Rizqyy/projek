<?php
    session_start();
    $con=mysqli_connect('localhost','root','','db_perpustakaan');
    if(!$con){
        die("gagal".mysqli_connect_error());
    }
?>
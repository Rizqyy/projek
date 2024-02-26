<?php
     include "koneksi.php";
     if(isset($_SESSION['user'])){
         header('location:index.php');
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="assets/img/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style-login.css">
    <style>
        body{
            background-image: url('assets/img/perpus.jpg');
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="contener">
        <h1>Login</h1>
        <form action="aksi/aksi-login.php" method="post">
            <div class="text">
                <input type="text" name="email" required>
                <label>Email</label>
                <span></span>
            </div>
            <div class="text">
                <input type="password" name="pass" required>
                <label>Password</label>
                <span></span>
            </div>
            <input type="submit" name="submit" value="Masuk">
        </form>
        <div class="sign">
            Belum Punya Akun? <a href="sign.php">Sign In!</a>
        </div>
    </div>
</body>
</html>
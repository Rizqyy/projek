<?php
    include "koneksi.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h1>Register Petugas</h1>
        <form action="aksi/aksi-tambah-petugas.php" method="post">
            <div class="text">
                <input type="text" name="username" required>
                <label>Username</label>
                <span></span>
            </div>
            <div class="text">
                <input type="text" name="nama_lengkap" required>
                <label>Nama Lengkap</label>
                <span></span>
            </div>
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
            <div class="text">
                <input type="text" name="alamat" required>
                <label>Alamat</label>
                <span></span>
            </div>
            <div class="level">
                <label>Level</label>
                <br>
                <select name="level" required>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
            <br>
            <input type="submit" value="Buat">
        </form>
    </div>
</body>
</html>
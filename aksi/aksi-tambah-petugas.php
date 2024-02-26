<?php

    include "../koneksi.php";
    if($_POST){
    $username = $_POST['username'];
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $alamat = $_POST['alamat'];
    $level = $_POST['level'];

    $input = mysqli_query($con, "INSERT INTO user(username, nama_lengkap, email, password, alamat, level) VALUES( '$username', '$nama', '$email', '$password', '$alamat', '$level')");
    
    if($input){
        echo '<script>
                alert("Tambah Petugas Berhasil");
                window.location = "../user.php";
                </script>';
        } else {
        echo "Error: " . mysqli_error($con);
        }
    }
?>
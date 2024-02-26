<?php
    include "../koneksi.php";

    $username = mysqli_real_escape_string($con,$_POST['username']);
    $nama = mysqli_real_escape_string($con,$_POST['nama_lengkap']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = md5($_POST['pass']);
    $alamat = mysqli_real_escape_string($con,$_POST['alamat']);
    $level = mysqli_real_escape_string($con,$_POST['level']);
    
    $input = mysqli_query($con, "INSERT INTO user VALUES('', '$username', '$nama', '$email', '$password', '$alamat',
     '$level')");
    if(!empty($input)){
      echo '<script>
            alert("Daftar Berhasil");
            window.location = "../login.php";
            </script>';
    }
    ?>
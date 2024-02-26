<?php
  include "../koneksi.php";
  if(isset($_POST['submit'])){
      $kategori = mysqli_real_escape_string($con,$_POST['nama_kategori']);
      
      $input = mysqli_query($con, "INSERT INTO kategoribuku(nama_kategori) VALUES ( '$kategori')");
      if(!empty($input)){
        echo '<script>
              alert("Tambah Buku Kategori");
              window.location = "../kategori.php";
              </script>';
      }
  }  
?>
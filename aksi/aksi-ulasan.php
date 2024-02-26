<?php
  include "../koneksi.php";
  if(isset($_POST['submit'])){
      $id = $_SESSION['userID'];
      $buku = mysqli_real_escape_string($con,$_POST['bukuID']);
      $ulasan = mysqli_real_escape_string($con,$_POST['ulasan']);
      $rating = mysqli_real_escape_string($con,$_POST['rating']);
      
      $input = mysqli_query($con, "INSERT INTO ulasanbuku(userID, bukuID, ulasan, rating) VALUES ( '$id','$buku','$ulasan','$rating')");
      if(!empty($input)){
        echo '<script>
              alert("Tambah Ulasan Berhasil");
              window.location = "../buku.php";
              </script>';
      }
  }  
?>
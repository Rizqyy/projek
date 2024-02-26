<?php
  include "../koneksi.php";
  if(isset($_GET['bukuID'])){
      $bukuID = $_GET['bukuID'];
      $cek = mysqli_query($con, "SELECT * FROM buku WHERE bukuID='$bukuID'");
      $data = mysqli_fetch_array($cek);

      $id = $_SESSION['userID'];
      $buku = $data['bukuID'];
      
      if($data){
        mysqli_query($con, "INSERT INTO koleksipribadi(userID, bukuID) VALUES ( '$id','$buku')");
        header('location: ../favorit.php');
      }
  }  
?>
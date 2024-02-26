<?php
    if(isset($_POST['submit'])){
      include "../koneksi.php";
      $tambah=mysqli_query($con,"SELECT * From buku where bukuID='".$_GET['bukuID']."'");
      $data=mysqli_fetch_array($tambah);
      $_SESSION['cart'][]=array(
        'bukuID'=>$data['bukuID'],
        'judul'=>$data['judul'],
        'stok'=>$_POST['jumlah']);
      }  
      header('location: ../keranjang.php');
?>